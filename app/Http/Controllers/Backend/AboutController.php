<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

/**
 * CRUD страницы «О нас» в админке.
 * Контент один (одна запись в about).
 */
class AboutController extends Controller
{
    /**
     * Список — одна запись, редирект на редактирование.
     */
    public function index(): RedirectResponse
    {
        $about = About::first();
        if (!$about) {
            About::create([
                'title_ru' => 'О театре',
                'subtitle_ru' => 'История, миссия и ценности театрально-концертного зала Борбад',
                'missions' => [],
                'histories' => [],
                'stats' => [],
            ]);
            $about = About::first();
        }
        return redirect()->route('admin.about.edit', $about);
    }

    /**
     * Форма редактирования контента «О нас».
     */
    public function edit(About $about): View
    {
        return view('backend.about.edit', compact('about'));
    }

    /**
     * Сохранение изменений.
     */
    public function update(AboutRequest $request, About $about): RedirectResponse
    {
        $data = $request->validated();
        unset($data['image']);

        // Очистка пустых элементов в массивах
        foreach (['missions', 'histories', 'stats'] as $key) {
            if (isset($data[$key]) && is_array($data[$key])) {
                $data[$key] = array_values(array_filter($data[$key], function ($item) {
                    return is_array($item) && array_filter($item) !== [];
                }));
            }
        }
        if (isset($data['blocks']) && is_array($data['blocks'])) {
            $data['blocks'] = array_intersect_key($data['blocks'], array_flip(array_keys(About::blockKeys())));
        }

        $removeImage = $request->boolean('remove_image');
        if ($removeImage && $about->image) {
            $oldPath = public_path($about->image);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $data['image'] = null;
        }
        unset($data['remove_image']);

        if ($request->hasFile('image')) {
            if ($about->image) {
                $oldPath = public_path($about->image);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }
            $file = $request->file('image');
            $dir = public_path('upload/about');
            if (!File::exists($dir)) {
                File::makeDirectory($dir, 0755, true);
            }
            $name = now()->format('Ymd_His') . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($dir, $name);
            $data['image'] = 'upload/about/' . $name;
        }

        $about->update($data);

        return redirect()->route('admin.about.edit', $about)->with([
            'message' => 'Страница «О нас» успешно обновлена.',
            'alert-type' => 'success',
        ]);
    }
}
