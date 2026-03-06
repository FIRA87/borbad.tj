-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-5.7:3306
-- Время создания: Мар 06 2026 г., 17:35
-- Версия сервера: 5.7.44
-- Версия PHP: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `borbard`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_tj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `missions` json DEFAULT NULL,
  `histories` json DEFAULT NULL,
  `stats` json DEFAULT NULL,
  `blocks` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `about`
--

INSERT INTO `about` (`id`, `title_ru`, `title_tj`, `title_en`, `subtitle_ru`, `subtitle_tj`, `subtitle_en`, `image`, `missions`, `histories`, `stats`, `blocks`, `created_at`, `updated_at`) VALUES
(1, 'О театре', 'Дар бораи театр', 'About the theatre', 'История, миссия и ценности театрально-концертного зала Борбад', 'Таърих, миссия ва арзишҳои театр ва толори консертии «Борбад»', 'History, mission, and values of the Borbad Theater and Concert Hall', 'upload/about/20260211_150245_698c53c547ebf.jpeg', '[{\"text_en\": \"It was built in 1984 according to a collective project by Uzbek architects Sergos Sutyagin, O. V. Legostayeva, S. I. Sokolov, S. N. Romanov, R. S. Niyozaliyeva, and engineer A. S. Brelovsky.\\r\\n\\r\\nThe building is located in the center of Dushanbe, on the shore of the “Lake of Youth,” with its main façade facing Ismoil Somoni Street.\", \"text_ru\": \"Он был построен в 1984 году по коллективному проекту узбекских архитекторов Серго Сутягина, О. В. Легостаевой, С. И. Соколова, С. Н. Романова, Р. С. Нийозалиевой и инженера А. С. Бреловского.\\r\\n\\r\\nЗдание расположено в центре Душанбе, на берегу «Озера молодости», главным фасадом выходит на улицу Исмоила Сомони.\", \"text_tj\": \"Соли 1984 тибқи лоиҳаи дастаҷамъонаи меъморони Узбекистон Серго Сутягин, О. В. Легостаева, С. И. Соколов, С. Н. Романов, Р. С. Ниёзалиева ва муҳандис А. С. Бресловский бунёд шудааст.\\r\\n\\r\\nБино дар маркази шаҳри Душанбе, дар шафати соҳили «Кӯли ҷавонон» ҷой гирифта, намои асосии он ба сӯи кӯчаи Исмоили Сомонӣ нигаронида шудааст.\", \"title_en\": \"Construction history\", \"title_ru\": \"История строительства\", \"title_tj\": \"Таърихи сохтмон\"}, {\"text_en\": \"Both palace buildings, which were constructed with a monolithic concrete frame, are resistant to a 9-magnitude earthquake.\\r\\n\\r\\nThe large “Kokh-e Borbad” building is conical in shape, and its upper section features a carved frieze reminiscent of the stone houses of the mountainous regions of Tajikistan.\", \"text_ru\": \"Оба здания дворца, построенные с использованием монолитного бетонного каркаса, способны выдержать землетрясение магнитудой 9 баллов.\\r\\n\\r\\nБольшое здание «Кох-е Борбад» имеет коническую форму, а в его верхней части находится резной фриз, напоминающий каменные дома горных районов Таджикистана.\", \"text_tj\": \"Ҳар ду бинои кох, ки бо қолаби бетони монолитӣ сохта шудаанд, ба заминларзаи 9-балла тобоваранд.\\r\\n\\r\\nБинои калони «Кохи Борбад» мудаввари махрутшакл буда, дар қисми боло шерозаи нақшин дорад, ки хонаҳои сангини ноҳияҳои кӯҳистони Тоҷикистонро ба хотир меоварад.\", \"title_en\": \"Architectural features\", \"title_ru\": \"Особенности архитектуры\", \"title_tj\": \"Хусусиятҳои меъморӣ\"}, {\"text_en\": \"“Kokhi Borbad” consists of 2 parts: a two-story courtyard with a small theater, a large amphitheater-style concert hall (with 2,300 seats), and service rooms.\\r\\n\\r\\nThe large hall is intended for showing any kind of film, pop concerts, festivals and forums, conferences, and other public and political events.\", \"text_ru\": \"Дворец «Борбад» состоит из двух частей: двухэтажного внутреннего двора с небольшим залом, большого концертного зала амфитеатрального типа (на 2300 мест) и служебных помещений.\\r\\n\\r\\nБольшой зал предназначен для показа любых фильмов, проведения поп-концертов, фестивалей и форумов, консультаций и других общественных и политических мероприятий.\", \"text_tj\": \"«Кохи Борбад» аз 2 қисм: миёнсаройи дуошёна ботолори хурд, толори калони киноконсертии амфитеатрмонанд (бо 2300 ҷои нишаст) ва утоқҳои хидматрасонӣ иборат аст.\\r\\n\\r\\nТолори калон барои намоиши ҳама гуна филм, консертҳои эстрадӣ, фестивалу форум, машварат ва дигар тадбирҳои ҷамъиятию сиёсӣ таъйин шудааст.\", \"title_en\": \"Architecture and structure\", \"title_ru\": \"Архитектура и структура\", \"title_tj\": \"Архитектура и структура\"}, {\"text_en\": \"When planning and designing the Borbad Palace project, the architects and engineers took into account national customs and traditions, striving to create a resemblance between this building and the architectural monuments of the Tajiks\' ancestors.\", \"text_ru\": \"При планировании и проектировании дворца «Борбад» архитекторы и инженеры учитывали национальные обычаи и традиции, стремясь обеспечить сходство этого здания с архитектурными памятниками предков таджиков.\", \"text_tj\": \"Меъморону муҳандисон зимни тартиб ва таҳияи лоиҳаи «Кохи Борбад» хусусиятҳои расму таомули миллиро ба эътибор гирифта, кӯшидаанд, ки байни ин бино ва ёдгориҳои меъмории ниёкони тоҷик монандӣ вуҷуд дошта бошад.\", \"title_en\": \"Cultural heritage\", \"title_ru\": \"Культурное наследие\", \"title_tj\": \"Мероси фарҳангӣ\"}, {\"text_en\": \"It is equipped with the necessary equipment, such as lighting fixtures, speech translation, and a modern stereo acoustic system.\\r\\n\\r\\nThe rooms have spaces for the performers and a special area—a revolving stage for the orchestra.\", \"text_ru\": \"Он оснащен необходимым оборудованием, таким как осветительные установки, система перевода речи и современная стереоакустическая система. В залах есть места для исполнителей и специальная зона — вращающаяся сцена для оркестра.\", \"text_tj\": \"Бо таҷҳизоти зарурӣ аз қабили дастгоҳҳои равшанидиҳанда, тарҷумаи нутқ, системаи муосири акустикӣ-стереофонӣ муҷаҳҳаз аст.\\r\\n\\r\\nУтоқҳо барои ҳунармандон ва ҷои махсус ‒ фарши гирдгардон барои оркестр дорад.\", \"title_en\": \"Technical equipment\", \"title_ru\": \"Техническое оснащение\", \"title_tj\": \"Таҷҳизоти техникӣ\"}, {\"text_en\": \"In 2003, in connection with the International “Fresh Water” Forum (under the auspices of the UN), the “Kokhi Borbad” building was repaired and renovated.\", \"text_ru\": \"В 2003 году, в связи с проведением Международного форума «Пресная вода» (под эгидой ООН), здание «Кохи Борбад» было отремонтировано и отреставрировано.\", \"text_tj\": \"Соли 2003 ба муносибати баргузории Форуми байналмилалии «Оби тоза» (таҳти сарпарастии СММ) бинои «Кохи Борбад» таъмиру тармим гардид.\", \"title_en\": \"Reconstruction\", \"title_ru\": \"Реконструкция\", \"title_tj\": \"Барқарорсозӣ\"}]', '[{\"side\": \"left\", \"year\": \"1985\", \"text_en\": \"Opening of a theater and concert hall in the center of Dushanbe as the capital\'s cultural center\", \"text_ru\": \"Открытие театрально-концертного зала в центре Душанбе как культурного центра столицы\", \"text_tj\": \"Кушодани театр ва толори консертӣ дар маркази Душанбе ҳамчун маркази фарҳангии пойтахт\", \"title_en\": \"Basis\", \"title_ru\": \"Основание\", \"title_tj\": \"Асос\"}, {\"side\": \"right\", \"year\": \"1998\", \"text_en\": \"Large-scale modernization of the hall with the installation of modern equipment\", \"text_ru\": \"Масштабная модернизация зала с установкой современного оборудования\", \"text_tj\": \"Модернизатсияи васеи толор бо насби таҷҳизоти муосир\", \"title_en\": \"Reconstruction\", \"title_ru\": \"Реконструкция\", \"title_tj\": \"Барқарорсозӣ\"}, {\"side\": \"left\", \"year\": \"2010\", \"text_en\": \"Addition of a chamber hall and exhibition space\", \"text_ru\": \"Добавление камерного зала и пространства для выставок\", \"text_tj\": \"Илова кардани толори анҷуман ва фазои намоишгоҳӣ\", \"title_en\": \"Expansion\", \"title_ru\": \"Расширение\", \"title_tj\": \"Васеъкунӣ\"}, {\"side\": \"right\", \"year\": \"2026\", \"text_en\": \"A leading cultural venue with over 200 events per year\", \"text_ru\": \"Ведущая культурная площадка с более чем 200 мероприятиями в год\", \"text_tj\": \"Маркази пешсафи фарҳангӣ бо беш аз 200 чорабинӣ дар як сол\", \"title_en\": \"Today\", \"title_ru\": \"Сегодня\", \"title_tj\": \"Имрӯз\"}, {\"side\": \"left\", \"year\": null, \"text_en\": null, \"text_ru\": null, \"text_tj\": null, \"title_en\": null, \"title_ru\": null, \"title_tj\": null}, {\"side\": \"left\", \"year\": null, \"text_en\": null, \"text_ru\": null, \"text_tj\": null, \"title_en\": null, \"title_ru\": null, \"title_tj\": null}]', '[{\"num\": \"2100+\", \"label_en\": \"Seating capacity\", \"label_ru\": \"Посадочных мест\", \"label_tj\": \"Ҷойҳои нишаст\"}, {\"num\": \"200+\", \"label_en\": \"Events per year\", \"label_ru\": \"Мероприятий в год\", \"label_tj\": \"Чорабиниҳо дар як сол\"}, {\"num\": \"40+\", \"label_en\": \"Years of history\", \"label_ru\": \"Лет истории\", \"label_tj\": \"Солҳои таърих\"}, {\"num\": \"50K+\", \"label_en\": \"Visitors per year\", \"label_ru\": \"Посетителей в год\", \"label_tj\": \"Меҳмонон дар як сол\"}]', '{\"reconstruction\": {\"text_en\": null, \"text_ru\": null, \"text_tj\": null, \"title_en\": null, \"title_ru\": null, \"title_tj\": null}, \"cultural_heritage\": {\"text_en\": null, \"text_ru\": null, \"text_tj\": null, \"title_en\": null, \"title_ru\": null, \"title_tj\": null}, \"technical_equipment\": {\"text_en\": null, \"text_ru\": null, \"text_tj\": null, \"title_en\": null, \"title_ru\": null, \"title_tj\": null}, \"construction_history\": {\"text_en\": \"Borbad is not just a concert hall, it is the cultural heart of our city. Since opening, we have strived to provide our guests with unforgettable experiences through art.\\r\\n\\r\\nOur hall can accommodate more than 500 spectators and is equipped with modern sound and lighting equipment, allowing us to host events of any scale and format.\", \"text_ru\": \"Борбад — это не просто концертный зал, это культурное сердце нашего города. С момента открытия мы стремимся предоставлять нашим гостям незабываемые впечатления от встречи с искусством.\\r\\n\\r\\nНаш зал вмещает более 500 зрителей и оснащён современным звуковым и световым оборудованием, что позволяет проводить мероприятия любого масштаба и формата.\", \"text_tj\": \"«Борбад» на танҳо толори консертӣ аст, балки қалби фарҳангии шаҳри мост. Аз замони ифтитоҳ, мо талош кардаем, ки ба меҳмонони худ тавассути вохӯрӣ бо санъат таҷрибаҳои фаромӯшнашавандаро пешкаш намоем.\\r\\n\\r\\nТолори мо метавонад беш аз 500 тамошобинро дар бар гирад ва бо таҷҳизоти муосири садо ва равшанӣ муҷаҳҳаз аст, ки ба мо имкон медиҳад чорабиниҳоро дар ҳар гуна миқёс ва формат баргузор намоем.\", \"title_en\": \"About us\", \"title_ru\": \"О нас\", \"title_tj\": \"Дар бораи мо\"}, \"architectural_features\": {\"text_en\": null, \"text_ru\": null, \"text_tj\": null, \"title_en\": null, \"title_ru\": null, \"title_tj\": null}, \"architecture_structure\": {\"text_en\": null, \"text_ru\": null, \"text_tj\": null, \"title_en\": null, \"title_ru\": null, \"title_tj\": null}}', '2026-02-10 12:55:26', '2026-02-13 07:06:57');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `position` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title_ru`, `title_en`, `title_tj`, `category_slug`, `status`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Новости', 'News', 'Ахбор', 'news', 1, 1, '2025-11-01 06:08:35', '2025-11-01 09:53:22'),
(2, 'Главная страница', 'Main', 'Саҳифаи асосӣ', 'main', 1, 2, '2025-12-30 10:39:20', '2025-12-30 10:39:20'),
(3, 'События', 'Events', 'Чорабиниҳо', 'events', 1, 3, '2026-02-06 08:36:56', '2026-02-06 08:36:56'),
(4, 'Наши услуги', 'Our Services', 'Хизматрасониҳои мо', 'our-services', 1, 4, '2026-03-02 06:48:49', '2026-03-02 06:48:49');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message_ru` text COLLATE utf8mb4_unicode_ci,
  `message_tj` text COLLATE utf8mb4_unicode_ci,
  `message_en` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `title_ru`, `title_tj`, `title_en`, `email`, `phone`, `subject`, `message_ru`, `message_tj`, `message_en`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Fira', 'Обращение от Fira', 'Муроҷиат аз Fira', 'Message from Fira', 'olimov.88@inbox.ru', '9000000000', 'rent', 'Сколько стоит ?', NULL, NULL, 1, '2026-02-12 11:46:40', '2026-02-12 11:46:40'),
(13, 'Messi', 'Обращение от Messi', 'Муроҷиат аз Messi', 'Message from Messi', 'user1@user.com', '9854575421', 'tickets', 'Откуда можно купить?', NULL, NULL, 1, '2026-02-12 11:47:36', '2026-02-12 11:47:36');

-- --------------------------------------------------------

--
-- Структура таблицы `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_tj` text COLLATE utf8mb4_unicode_ci,
  `description_ru` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'путь к загруженному файлу',
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'pdf' COMMENT 'pdf, docx, xlsx и т.д.',
  `published_at` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ru` text COLLATE utf8mb4_unicode_ci,
  `text_tj` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `galleries`
--

INSERT INTO `galleries` (`id`, `title_ru`, `title_tj`, `title_en`, `text_ru`, `text_tj`, `text_en`, `cover`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Кохи Борбад', 'Кохи Борбад', '-', 'ТЕКСТ [RU]', 'ТЕКСТ [TJ]', 'ТЕКСТ [EN]', '1770794616_vdushanbeprosheltadzhiksko-indiyskiyselskohozyaystvennyyforum.jpg', 1, '2026-02-11 07:23:36', '2026-02-11 07:23:36');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `image`, `gallery_id`, `created_at`, `updated_at`) VALUES
(22, '1770794616_005.jpg', 5, '2026-02-11 07:23:36', '2026-02-11 07:23:36'),
(23, '1770794616_006.jpg', 5, '2026-02-11 07:23:36', '2026-02-11 07:23:36'),
(24, '1770794616_011.jpeg', 5, '2026-02-11 07:23:36', '2026-02-11 07:23:36'),
(25, '1770794616_012.jpeg', 5, '2026-02-11 07:23:36', '2026-02-11 07:23:36'),
(26, '1770794616_vdushanbeprosheltadzhiksko-indiyskiyselskohozyaystvennyyforum.jpg', 5, '2026-02-11 07:23:36', '2026-02-11 07:23:36');

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ru` text COLLATE utf8mb4_unicode_ci,
  `description_tj` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `requirements_ru` longtext COLLATE utf8mb4_unicode_ci,
  `requirements_tj` longtext COLLATE utf8mb4_unicode_ci,
  `requirements_en` longtext COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `attachments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `jobs`
--

INSERT INTO `jobs` (`id`, `title_ru`, `title_tj`, `title_en`, `slug`, `image`, `description_ru`, `description_tj`, `description_en`, `requirements_ru`, `requirements_tj`, `requirements_en`, `location`, `salary`, `start_date`, `end_date`, `attachments`, `is_active`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Специалист в отдел по взаимодействию с инвесторами', 'Мутахассиси робитаҳои сармоягузорӣ', 'Investor Relations Specialist', 'investor-relations-specialist', 'upload/jobs/20260211_122925_012.jpeg', 'Это отличная возможность для амбициозных профессионалов применить аналитические навыки в сфере финансов и взаимодействия с инвесторами. Вы получите уникальный опыт привлечения инвестиций в капитал HoldCo в Великобритании, работая с топ-менеджерами из Узбекистана, Таджикистана, Пакистана и международными инвесторами из США и Великобритании.', 'Ин як имконияти олӣ барои мутахассисони амбициозӣ мебошад, то малакаҳои таҳлилии худро дар соҳаи молия ва муносибатҳои сармоягузорӣ истифода баранд. Шумо таҷрибаи беназир дар ҷалби сармоя ба капитали HoldCo дар Британияи Кабир хоҳед гирифт, ҳамзамон бо роҳбарони сатҳи олӣ аз Узбекистон, Тоҷикистон, Покистон ва сармоягузорони байналмилалӣ аз ИМА ва Британияи Кабир кор мекунед.', 'This is an excellent opportunity for ambitious professionals to apply their analytical skills in finance and investor relations. You will gain unique experience in attracting investment to HoldCo\'s capital in the UK, working with top managers from Uzbekistan, Tajikistan, Pakistan, and international investors from the US and UK.', NULL, NULL, NULL, 'Душанбе', '2500', '2026-02-01', '2026-03-31', '[\"upload\\/jobs\\/attachments\\/20260211_122925_698c2fd52e3d6_006.jpg\"]', 1, 1, '2026-02-11 07:29:25', '2026-02-11 13:25:04');

-- --------------------------------------------------------

--
-- Структура таблицы `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_letter` text COLLATE utf8mb4_unicode_ci,
  `resume` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` enum('new','reviewed','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `admin_notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `leaders`
--

CREATE TABLE `leaders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_tj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ru` text COLLATE utf8mb4_unicode_ci,
  `text_tj` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_days` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `leaders`
--

INSERT INTO `leaders` (`id`, `image`, `title_ru`, `title_tj`, `title_en`, `position_ru`, `position_tj`, `position_en`, `text_ru`, `text_tj`, `text_en`, `email`, `phone`, `working_days`, `slug`, `views`, `status`, `sort`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Розикзода Джумахон Джафар', 'Розиқзода Ҷумъахон Ҷаъфар', 'Rozikzoda Jumakhon Jafar', 'Директор', 'Директор', '-', 'Текст RU', 'Текст TJ', 'Текст EN', 'inf@info.tj', '+992 372 27 09 46', NULL, 'rozikzoda-jumakhon-jafar', 0, 1, 1, '2026-02-18 04:28:30', '2026-02-18 04:31:32'),
(3, NULL, 'Азизов Махмадиюсуф Саймирзоевич', 'Азизов Маҳмадюсуф Саймирзоевич', 'Azizov Mahmadiyusuf Saymirzoevich', '-', 'Муовини Директор', '-', 'Текст RU', 'Текст TJ', 'Текст EN', 'muovin@info.tj', '+992 372 27 09 46', NULL, 'azizov-mahmadiyusuf-saymirzoevich', 0, 1, 2, '2026-02-18 04:30:48', '2026-02-18 04:30:48');

-- --------------------------------------------------------

--
-- Структура таблицы `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) DEFAULT '1',
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `links`
--

INSERT INTO `links` (`id`, `type`, `title_ru`, `title_tj`, `title_en`, `img`, `url`, `status`, `sort`, `created_at`, `updated_at`) VALUES
(9, 2, 'Пресс-служба Президента Таджикистана', 'Хадамоти матбуоти Президенти Тоҷикистон', 'Press Service of the President of Tajikistan', 'upload/links/2026-03-02Emblem_of_Tajikistan.svg.png', 'https://www.president.tj/', 1, 1, '2025-12-16 15:52:38', '2026-03-02 06:37:05'),
(10, 1, 'Национальное информационное агентство Таджикистана «Ховар»', 'Агентии миллии иттилоотии Тоҷикистон «Ховар»', 'National Information Agency of Tajikistan \"Khovar\"', 'upload/links/2026-03-02logo_khovar_tj.png', 'https://khovar.tj/', 1, 2, '2026-03-02 06:42:20', '2026-03-02 06:42:20'),
(11, 1, 'Государственный комитет по инвестициям и управлению государственным имуществом', 'Кумитаи давлатии сармоягузорӣ ва идораи амволи давлатии Ҷумҳурии Тоҷикистон', 'State Committee on Investments and State property management of the Republic of Tajikistan', 'upload/links/2026-03-02Emblem_of_Tajikistan.svg.png', 'https://investcom.tj/', 1, 3, '2026-03-02 06:43:44', '2026-03-02 06:43:44'),
(12, 1, 'Национальный центр законодательства при Президенте Республики Таджикистан', 'Маркази миллии қонунгузории назди Президенти Ҷумҳурии Тоҷикистон', 'National Legislation Center under the President of the Republic of Tajikistan', 'upload/links/2026-03-02Emblem_of_Tajikistan.svg.png', 'https://mmk.tj/', 1, 4, '2026-03-02 06:44:54', '2026-03-02 06:44:54');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2023_05_02_142303_create_permission_tables', 10),
(26, '2023_04_13_110116_create_categories_table', 11),
(27, '2023_04_17_031628_create_news_table', 12),
(29, '2023_05_05_135908_create_pages_table', 14),
(30, '2023_10_20_141701_create_subpages_table', 15),
(37, '2023_04_24_091747_create_galleries_table', 16),
(38, '2023_04_24_092132_create_images_table', 16),
(39, '2023_04_25_140958_create_videos_table', 16),
(40, '2023_05_04_104828_create_notifications_table', 16),
(41, '2023_05_06_163421_create_settings_table', 16),
(42, '2025_10_30_153219_create_management_table', 16),
(43, '2025_10_31_140145_create_presidents_table', 16),
(44, '2025_10_31_140205_create_projects_table', 16),
(53, '2025_10_31_140317_create_services_table', 17),
(55, '2025_10_31_000000_create_surveys_table', 19),
(56, '2025_10_31_000001_create_questions_table', 19),
(57, '2025_10_31_000002_create_options_table', 19),
(58, '2023_05_06_123121_create_links_table', 20),
(59, '2025_10_31_140356_create_tasks_table', 21),
(60, '2025_11_03_161702_create_service_requests_table', 22),
(61, '2025_11_04_080358_create_task_items_table', 23),
(62, '2025_11_04_085217_create_news_tasks_table', 24),
(63, '2025_11_04_085250_create_news_images_table', 24),
(64, '2025_11_04_173627_create_leaders_table', 25),
(65, '2025_11_05_090334_create_contacts_table', 26),
(66, '2025_11_05_162703_create_answers_table', 27),
(67, '2025_11_10_143611_create_jobs_table', 28),
(68, '2025_11_11_090003_create_documents_table', 29),
(69, '2025_12_02_094135_create_job_applications_table', 30),
(70, '2025_12_09_112541_create_static_translations_table', 31),
(71, '2025_12_22_000001_create_page_images_table', 32),
(72, '2026_02_10_120000_add_working_hours_to_settings_table', 32),
(73, '2026_02_10_140000_create_about_table', 32),
(74, '2026_02_11_000000_add_blocks_to_about_table', 33),
(75, '2026_02_11_100000_add_image_to_about_table', 33),
(76, '2026_02_11_120000_seed_about_page_translations', 34),
(77, '2026_02_12_000000_seed_footer_translations', 34),
(78, '2026_02_12_100000_add_subject_to_contacts_table', 34);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no-image.jpg',
  `news_details_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_details_tj` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_slider` tinyint(1) NOT NULL DEFAULT '0',
  `publish_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `home_page` tinyint(1) NOT NULL DEFAULT '0',
  `views` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `category_id`, `user_id`, `title_ru`, `title_tj`, `title_en`, `slug`, `image`, `news_details_ru`, `news_details_tj`, `news_details_en`, `top_slider`, `publish_date`, `status`, `home_page`, `views`, `created_at`, `updated_at`) VALUES
(16, 1, 1, 'Фольклорные ансамбли', 'Ансамблҳои мардумӣ', 'Folk ensembles', 'folk-ensembles', 'upload/news/2026-02-06_1770373937_012.jpeg', 'Фольклорные ансамбли', 'Ансамблҳои мардумӣ', 'Folk ensembles', 1, '2026-01-06 00:00:00', 1, 0, 3, '2026-02-06 10:32:17', '2026-03-02 06:52:16'),
(17, 1, 1, '-', '-', '-', '', 'upload/news/2026-02-06_1770374018_vdushanbeprosheltadzhiksko-indiyskiyselskohozyaystvennyyforum.jpg', 'Текст RU', 'Текст TJ', 'Текст EN', 1, '2026-01-07 00:00:00', 1, 0, 0, '2026-02-06 10:33:38', '2026-02-06 10:33:38'),
(18, 1, 1, '-', '-', '-', '-1', 'upload/news/2026-02-06_1770374039_005.jpg', 'Текст RU', 'Текст TJ', 'Текст EN', 1, '2026-01-10 00:00:00', 1, 0, 2, '2026-02-06 10:33:59', '2026-02-13 08:05:09'),
(19, 1, 1, '-', '-', '-', '-2', 'upload/news/2026-02-06_1770374055_006.jpg', 'Текст RU', 'Текст TJ', 'Текст EN', 1, '2026-01-15 00:00:00', 1, 0, 4, '2026-02-06 10:34:15', '2026-03-03 04:28:35'),
(20, 3, 1, 'Вечер дружбы Таджикистана и Казахстана', 'ШОМИ ДӮСТӢ»-И ТОҶИКИСТОНУ ҚАЗОҚИСТОН', 'Tajikistan and Kazakhstan Friendship Evening', 'tajikistan-and-kazakhstan-friendship-evening', 'upload/news/2026-02-06_1770375051_001.jpg', 'Текст RU', '<p>Асосгузори сулҳу ваҳдати миллӣ — Пешвои миллат, Президенти Ҷумҳурии Тоҷикистон муҳтарам Эмомалӣ Раҳмон ва Раиси Маҷлиси миллии Маҷлиси Олии Ҷумҳурии Тоҷикистон, Раиси шаҳри Душанбе муҳтарам Рустам Эмомалӣ Президенти Ҷумҳурии Қазоқистон муҳтарам Қосим-Жомарт Токаев дар барномаи консертии «Шоми дӯстӣ» дар Маҷмааи давлатии «Кохи Борбад», ки дар доираи Рӯзҳои фарҳанги Қазоқистон баргузор мегардад, ҳузур доранд.</p>', 'Текст EN', 0, '2025-08-22 00:00:00', 1, 0, 1, '2026-02-06 10:50:51', '2026-02-13 08:14:57'),
(21, 3, 1, 'Вечер дружбы Таджикистана и Кыргызстана', 'ШОМИ ДӮСТӢ»-И ТОҶИКИСТОНУ ҚИРҒИЗИСТОН', 'Tajikistan and Kyrgyzstan Friendship Evening', 'tajikistan-and-kyrgyzstan-friendship-evening', 'upload/news/2026-02-06_1770375158_002.jpg', 'Текст RU', '<div>Шоми 8 июл дар доираи сафари давлатии Президенти Қирғизистон ба Тоҷикистон дар толори бошукуҳи “Кохи Борбад” барномаи фарҳангии арбобони санъати Тоҷикистону Қирғизистон бо номи “Дӯстии абадӣ” баргузор гардид. Дар чорабинии фарҳангӣ Президенти мамлакат Эмомалӣ Раҳмон ва Президенти Қирғизистон Садир Жапаров иштирок намуданд.</div><div>“Баргузории чорабиниҳои фарҳангӣ идомаи анъанаи неки муносибатҳои дӯстӣ, бародарӣ, ҳамҷаворӣ ва омили муҳими рушду густариши робитаҳои гуногунҷанба ба манфиати мардумони ҳар ду кишвар мебошад”,-таъкид мекунад хадамоти матбуоти Сарвари давлат.</div>', 'Текст EN', 0, '2025-07-08 00:00:00', 1, 0, 2, '2026-02-06 10:52:38', '2026-02-10 10:40:33'),
(22, 3, 1, 'Вечер дружбы Таджикистана и Узбекистана', 'ШОМИ ДӮСТӢ»-И ТОҶИКИСТОНУ ӮЗБЕКИСТОН', 'An Evening of Friendship between Tajikistan and Uzbekistan', 'an-evening-of-friendship-between-tajikistan-and-uzbekistan', 'upload/news/2026-02-06_1770375276_003.jpg', 'Текст RU', '<div>10 июн Президенти Ҷумҳурии Тоҷикистон муҳтарам Эмомалӣ Раҳмон бо Президенти Ҷумҳурии Ӯзбекистон муҳтарам Шавкат Мирзиёев дар консерти тантанавии ходимони фарҳангу санъати Тоҷикистон ва Ӯзбекистон таҳти унвони “Шоми дӯстӣ”, ки дар Кохи Борбад баргузор шуд, иштирок намуданд. Чорабинии мазкур бо суханронии Сарони давлатҳо Эмомалӣ Раҳмон ва Шавкат Мирзиёев оғоз гардид.</div><div><br></div><div>Президенти мамлакат муҳтарам Эмомалӣ Раҳмон бори дигар қаноатмандию нишоти худ ва мардуми Тоҷикистонро аз ташрифи расмии меҳмони олимақом - Президенти Ҷумҳурии Ӯзбекистон ба сарзамини офтобию меҳмоннавози Тоҷикистон изҳор намуда, натиҷаҳои онро қадами муҳиму устувор дар роҳи таъмиқи муносибатҳои неки ҳамҷаворӣ арзёбӣ карданд.</div><div><br></div><div>Таъкид гардид, ки муносибатҳои дӯстии мардумони мо аз қаъри таърих реша мегирад ва он бояд бо талошу ташаббусҳои муштараки халқҳо то абад поянда бимонад.</div><div><br></div><div>Зимни суханронии худ Президенти Ҷумҳурии Ӯзбекистон муҳтарам Шавкат Мирзиёев аз пазироии гарму самимӣ, дӯстона ва бародаронаи Президенти Ҷумҳурии Тоҷикистон муҳтарам Эмомалӣ Раҳмон ва мардуми тоҷик изҳори хушҳолӣ ва сипосу қадрдонӣ карданд.</div><div><br></div><div>Дар баромади худ Сарони давлатҳо инчунин оид ба идомаи анъанаи неки муносибатҳои дӯстӣ, бародарӣ, ҳамсоягӣ, хешу таборӣ ва рушду густариши ҳамкории гуногунҷанба ба манфиати мардумони ҳар ду кишвар андешаронӣ карда, баргузории консерти устодони санъати Тоҷикистону Ӯзбекистонро таҳти унвони “Шоми дӯстӣ” намунаи беҳтарини ҳамкории фарҳангӣ маънидод намуданд.</div><div><br></div><div>Макони баргузории чорабинии фарҳангӣ - толори Кохи Борбад бо иштироки Сарони давлатҳо муҳтарам Эмомалӣ Раҳмон ва муҳтарам Шавкат Мирзиёев аз самимияту дидори мардумони ба ҳам дӯсти ду кишвари ҳамсоя фазои тозаи идона дошт.</div><div><br></div><div>Баъди суханронии сарони давлатҳо чорабинии фарҳангии “Шоми дӯстӣ” бо барномаи рангину пурмуҳтавои аҳли фарҳангу санъати ду кишвар, ки тараннумкунандаи дӯстии мардумони Тоҷикистону Ӯзбекистон мебошад, идома ёфт.</div>', 'Текст EN', 0, '2022-06-10 00:00:00', 1, 0, 0, '2026-02-06 10:54:36', '2026-02-06 10:54:36'),
(23, 3, 1, 'Мероприятие по случаю 30-летия со дня создания Вооруженных Сил Республики Таджикистан', 'Чорабини оид ба ҷашни 30-солагии таъсисёбии Қувваҳои мусаллаҳиҶТ', 'Event to celebrate the 30th anniversary of the establishment of the Armed Forces of the Republic of Tajikistan', 'event-to-celebrate-the-30th-anniversary-of-the-establishment-of-the-armed-forces-of-the-republic-of-tajikistan', 'upload/no-image.jpg', 'Текст RU', '<span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Чорабини\r\nоид ба </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ашни\r\n30-солагии таъсисёбии </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Қ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">увва</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">ои мусалла</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">и</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">Т (22 феврали соли 2023),</span>', 'Текст EN', 0, '2023-02-22 00:00:00', 1, 0, 0, '2026-02-18 04:33:36', '2026-02-18 04:33:36'),
(24, 3, 1, 'Проведение культурной программы «Вечер дружбы»', 'Баргузории барномаи фарҳангии “Шоми дустӣ”', 'Holding the cultural program “Evening of Friendship”', 'holding-the-cultural-program-evening-of-friendship', 'upload/no-image.jpg', 'Текст RU', '<span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Баргузории\r\nбарномаи фар</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ангии\r\n“Шоми дуст</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">” бо\r\nиштироки Асосгузори сул</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">у ва</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">дати милл</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">, Пешвои миллат, Президенти </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">Т Эмомал</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\"> Ра</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">мон ва Президенти </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">ум</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">урии Туркманистон Сердар Бердиму</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">амедов (10 майи соли 2023),</span>', 'Текст EN', 0, '2023-05-10 00:00:00', 1, 0, 0, '2026-02-18 04:35:07', '2026-02-18 04:35:07'),
(25, 3, 1, 'Культурная программа «Вечер дружбы», посвященная пятому заседанию Консультативного форума глав государств Центральной Азии', 'Барномаи фарҳангии “Шоми дустӣ” бахшида ба вохҳӯрии панҷуми машваратии сарони давлатҳои Осиёи Марказӣ', 'Cultural program “Evening of Friendship” dedicated to the fifth meeting of the Central Asian Heads of State Consultative Council', 'cultural-program-evening-of-friendship-dedicated-to-the-fifth-meeting-of-the-central-asian-heads-of-state-consultative-council', 'upload/no-image.jpg', 'Текст RU', '<span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Барномаи\r\nфар</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:\r\n&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;\r\nmso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ангии\r\n“Шоми дуст</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">”\r\nбахшида ба вох</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ҳӯ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">рии\r\nпан</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:\r\n&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;\r\nmso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">уми\r\nмашваратии сарони давлат</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">ои Осиёи Марказ</span><span lang=\"TG\" style=\"font-size:\r\n12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\"> (14.09.2023),</span>', 'Текст EN', 0, '2023-09-14 00:00:00', 1, 0, 0, '2026-02-18 04:36:29', '2026-02-18 04:36:29'),
(26, 3, 1, 'Проведение выставки-продажи отечественной продукции в рамках проекта «Любимый бренд Таджикистана».', 'Баргузории намоиш – фурӯшт маҳсулоти ватанӣ дар доираи лоиҳаи “Тамғаи писандидаи Тоҷикистон', 'Organization of a showcase – sale of domestic products as part of the “Favorite Brand of Tajikistan” project.', 'organization-of-a-showcase-sale-of-domestic-products-as-part-of-the-favorite-brand-of-tajikistan-project', 'upload/no-image.jpg', 'Текст RU', '<span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Баргузории\r\nнамоиш – фур</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ӯ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">шт ма</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">сулоти ватан</span><span lang=\"TG\" style=\"font-size:\r\n12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\"> дар доираи лои</span><span lang=\"TG\" style=\"font-size:\r\n12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">аи “Там</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ғ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">аи писандидаи То</span><span lang=\"TG\" style=\"font-size:\r\n12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҷикистон</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\"> – 2023 (02,03 ва 04 ноябри соли 2023).</span>', 'Текст EN', 0, '2023-11-02 00:00:00', 1, 0, 0, '2026-02-18 04:37:21', '2026-02-18 04:37:21'),
(27, 3, 1, 'Первая концертная программа Фарруха Хасанова', 'Баргузории нахуст барномаи консертии Фаррух Ҳасанов', 'Farrukh Hasanov\'s first concert program', 'farrukh-hasanovs-first-concert-program', 'upload/no-image.jpg', 'Текст RU', '<span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Баргузории\r\nнахуст барномаи консертии Фаррух </span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">асанов (07.03.2024),</span>', 'Текст EN', 0, '2024-03-07 00:00:00', 1, 0, 0, '2026-02-18 04:38:30', '2026-02-18 04:38:30'),
(28, 3, 1, 'Проведение культурной программы «Вечер дружбы»', 'Баргузории барномаи фарҳангии “Шоми дустӣ”', 'Conducting the cultural program “Evening of Friendship”', 'conducting-the-cultural-program-evening-of-friendship', 'upload/no-image.jpg', 'Текст RU', '<span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Баргузории\r\nбарномаи фар</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ангии\r\n“Шоми дуст</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">” бо\r\nиштироки Асосгузори сул</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">у ва</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">дати милл</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">, Пешвои миллат, Президенти </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">Т Эмомал</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\"> Ра</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">мон ва Пешвои миллии хал</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">қ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">и туркман – Раиси Хал</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">қ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\"> Масла</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">атии Туркманистон му</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">тарам Гурбонгул</span><span lang=\"TG\" style=\"font-size:\r\n12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\"> Бердиму</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">амедов (10 майи соли 2024),</span>', 'Текст EN', 0, '2024-05-10 00:00:00', 1, 0, 0, '2026-02-18 04:39:19', '2026-02-18 04:39:19'),
(29, 3, 1, 'Проведение культурной программы «Вечер дружбы»', 'Баргузории барномаи фарҳангии “Шоми дустӣ”', 'Conducting the cultural program “Evening of Friendship”', 'conducting-the-cultural-program-evening-of-friendship-1', 'upload/no-image.jpg', 'Текст RU', '<span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Баргузории\r\nбарномаи фар</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ангии\r\n“Шоми дуст</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">” бо\r\nиштироки бо иштироки Асосгузори сул</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">у ва</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">дати милл</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">, Пешвои миллат, Президенти </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">Т Эмомал</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\"> Ра</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">мон ва Президенти </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">ум</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">урии Узбекистон му</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">тарам Мирзиёев Шавкат Миромонович (18.04.2024),</span>', 'Текст EN', 0, '2024-04-18 00:00:00', 1, 0, 0, '2026-02-18 04:40:06', '2026-02-18 04:40:06'),
(30, 3, 1, 'Проведение мероприятий по случаю 30-летия', 'Баргузории чорабиниҳо бахшида ба муносибати 30', 'Holding events to mark the 30th anniversary', 'holding-events-to-mark-the-30th-anniversary', 'upload/no-image.jpg', 'Текст RU', '<span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Баргузории\r\nчорабини</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">о\r\nбахшида ба муносибати 30 – солагии&nbsp;\r\nтаъсисёбии </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Қ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ушун</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">ои сар</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">адии Кумитаи Давлатии амнияти миллии </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">ум</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">урии То</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">икистон (27.05.2024),</span>', 'Текст EN', 0, '2024-05-27 00:00:00', 1, 0, 0, '2026-02-18 04:40:51', '2026-02-18 04:40:51');
INSERT INTO `news` (`id`, `category_id`, `user_id`, `title_ru`, `title_tj`, `title_en`, `slug`, `image`, `news_details_ru`, `news_details_tj`, `news_details_en`, `top_slider`, `publish_date`, `status`, `home_page`, `views`, `created_at`, `updated_at`) VALUES
(31, 3, 1, 'Проведение культурной программы «Вечер дружбы»', 'Баргузории барномаи фарҳангии “Шоми дустӣ”', 'Conducting the cultural program “Evening of Friendship”', 'conducting-the-cultural-program-evening-of-friendship-2', 'upload/no-image.jpg', 'Текст RU', '<span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Баргузории\r\nбарномаи фар</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ангии\r\n“Шоми дуст</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;mso-fareast-theme-font:\r\nminor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:TG;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">” бо\r\nиштироки бо иштироки Асосгузори сул</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">у ва</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">дати милл</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">, Пешвои миллат, Президенти </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">Т Эмомал</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\"> Ра</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">мон ва Президенти </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">ум</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">урии </span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Қ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">азо</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">қ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">истон му</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">тарам </span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Қ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">осим – Жомарт Токаев (22.05.2024),</span>', 'Текст EN', 0, '2024-05-22 00:00:00', 1, 0, 0, '2026-02-18 04:41:42', '2026-02-18 04:41:42'),
(32, 3, 1, 'Торжественное собрание и культурное мероприятие, посвященное 30-летию принятия Конституции Республики Таджикистан', 'Маҷлиси тантанавӣ ва чорабинии фарҳангӣ бахшида ба 30 – солагии қабули Конститутсияи Ҷумҳурии Тоҷикистон', 'Ceremonial assembly and cultural event dedicated to the 30th anniversary of the adoption of the Constitution of the Republic of Tajikistan', 'ceremonial-assembly-and-cultural-event-dedicated-to-the-30th-anniversary-of-the-adoption-of-the-constitution-of-the-republic-of-tajikistan', 'upload/no-image.jpg', 'Текст RU', '<span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Ма</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">лиси тантанав</span><span lang=\"TG\" style=\"font-size:\r\n12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\"> ва чорабинии фар</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">анг</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\"> бахшида ба 30 – солагии </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">қ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">абули Конститутсияи </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\nCambria;mso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">ум</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">урии То</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Times New Roman Tj&quot;,serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-bidi-font-family:\r\n&quot;Times New Roman Tj&quot;;mso-ansi-language:TG;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">икистон (05.11.2024).</span>', 'Текст EN', 0, '2024-11-05 00:00:00', 1, 0, 0, '2026-02-18 04:42:47', '2026-02-18 04:42:47'),
(33, 3, 1, 'Проведение выставки-продажи отечественной продукции в рамках проекта «Любимый бренд Таджикистана – 2025».', 'Баргузории намоиш – фурӯши маҳсулоти ватанӣ дар доираи лоиҳаи “Тамғаи писандидаи Тоҷикистон -2025”', 'Organization of a showcase – sale of domestic products as part of the “Favorite Brand of Tajikistan - 2025” project.', 'organization-of-a-showcase-sale-of-domestic-products-as-part-of-the-favorite-brand-of-tajikistan-2025-project', 'upload/no-image.jpg', 'Текст RU', '<p class=\"MsoListParagraph\" style=\"text-align:justify;text-indent:-18.0pt;\r\nmso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"TG\" style=\"font-size:\r\n12.0pt;line-height:115%;mso-fareast-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG\">1.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;mso-ansi-language:TG\">Баргузории намоиш – фур</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-bidi-font-family:Cambria;mso-ansi-language:TG\">ӯ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:TG\">ши ма</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-bidi-font-family:Cambria;mso-ansi-language:TG\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:TG\">сулоти ватан</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-bidi-font-family:Cambria;mso-ansi-language:TG\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:TG\"> дар доираи лои</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-bidi-font-family:Cambria;mso-ansi-language:TG\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:TG\">аи “Там</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-bidi-font-family:Cambria;mso-ansi-language:TG\">ғ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:TG\">аи писандидаи То</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-bidi-font-family:Cambria;mso-ansi-language:TG\">ҷикистон -2025</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-bidi-font-family:Cambria;\r\nmso-ansi-language:TG\">” (15-17.05.2025),<o:p></o:p></span></p>', 'Текст EN', 0, '2025-05-15 00:00:00', 1, 0, 0, '2026-02-18 04:43:40', '2026-02-18 04:43:40'),
(34, 3, 1, 'Культурное мероприятие «Вечная дружба»', 'Чорабинии фарҳангии “Дустии абадӣ”', 'Cultural event “Eternal Friendship”', 'cultural-event-eternal-friendship', 'upload/no-image.jpg', 'Текст RU', '<p class=\"MsoListParagraph\" style=\"text-align:justify;text-indent:-18.0pt;\r\nmso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span lang=\"TG\" style=\"font-size:\r\n12.0pt;line-height:115%;mso-fareast-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG\">1.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-size-adjust: none; font-language-override: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-variant-position: normal; font-variant-emoji: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;mso-bidi-font-family:Cambria;mso-ansi-language:TG\">Чорабинии\r\nфар</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:\r\n&quot;Cambria&quot;,serif;mso-bidi-font-family:Cambria;mso-ansi-language:TG\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:TG\">ангии</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-bidi-font-family:Cambria;\r\nmso-ansi-language:TG\"> “Дустии абад</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-bidi-font-family:Cambria;\r\nmso-ansi-language:TG\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;mso-bidi-font-family:Cambria;mso-ansi-language:TG\">” </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:TG\">бо иштироки бо\r\nиштироки Асосгузори сул</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Cambria&quot;,serif;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:\r\nTG\">у ва</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:\r\nTG\">дати милл</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;\r\nfont-family:&quot;Cambria&quot;,serif;mso-bidi-font-family:Cambria;mso-ansi-language:\r\nTG\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:\r\nTG\">, Пешвои миллат, Президенти </span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-bidi-font-family:Cambria;\r\nmso-ansi-language:TG\">Ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;mso-ansi-language:TG\">Т Эмомал</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-bidi-font-family:Cambria;\r\nmso-ansi-language:TG\">ӣ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;mso-ansi-language:TG\"> Ра</span><span lang=\"TG\" style=\"font-size:12.0pt;\r\nline-height:115%;font-family:&quot;Cambria&quot;,serif;mso-bidi-font-family:Cambria;\r\nmso-ansi-language:TG\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;mso-ansi-language:TG\">мон ва Президенти </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-bidi-font-family:Cambria;mso-ansi-language:TG\">Ҷ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:TG\">ум</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-bidi-font-family:Cambria;mso-ansi-language:TG\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:TG\">урии </span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-bidi-font-family:Cambria;mso-ansi-language:TG\">Қ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:TG\">ир</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-bidi-font-family:Cambria;mso-ansi-language:TG\">ғ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:TG\">изистон му</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;font-family:&quot;Cambria&quot;,serif;\r\nmso-bidi-font-family:Cambria;mso-ansi-language:TG\">ҳ</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:115%;mso-ansi-language:TG\">тарам Содир\r\nЖапаров (08.07.2025).</span><span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;mso-bidi-font-family:Cambria;mso-ansi-language:TG\"><o:p></o:p></span></p>', 'Текст EN', 0, '2025-07-08 00:00:00', 1, 0, 0, '2026-02-18 04:44:45', '2026-02-18 04:44:45'),
(35, 3, 1, 'Концерт «Песня года 2025» состоится 24 января 2026 года.', 'Баргузории консерт “Суруди Сол 2025” 24 январи соли 2026', 'The “Song of the Year 2025” concert will be held on January 24, 2026.', 'the-song-of-the-year-2025-concert-will-be-held-on-january-24-2026', 'upload/no-image.jpg', 'Текст RU', '<span lang=\"TG\" style=\"font-size:12.0pt;line-height:\r\n115%;font-family:&quot;Times New Roman Tj&quot;,serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman Tj&quot;;\r\nmso-ansi-language:TG;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">Баргузории\r\nконсерт “Суруди Сол 2025” 24 январи соли 2026</span>', 'Текст EN', 0, '2026-02-18 00:00:00', 1, 0, 0, '2026-02-18 04:45:18', '2026-02-18 04:45:18'),
(36, 4, 1, 'Концерт симфонического оркестра', 'Консерти оркестри симфонӣ', 'Symphony orchestra concert', 'symphony-orchestra-concert', 'upload/news/2026-03-02_1772434318_XXL_height.png', '<div>Произведения Чайковского и Рахманинова в исполнении Национального симфонического оркестра под руководством маэстро Фирдавса Абдурахмонова. Незабываемый вечер классической музыки в акустике мирового уровня.</div><div><br></div><div>19:00</div><div><br></div><div><p>Большой зал - 50 сомони</p></div>', '<p>Осори Чайковский ва Рахманинов дар иҷрои Оркестри Симфонии Миллӣ таҳти роҳбарии маэстро Фардавс Абдураҳмонов. Як шоми фаромӯшнашавандаи мусиқии классикӣ дар акустикаи сатҳи ҷаҳонӣ.</p><p><br></p><p>Соати 19:00</p><p>Толори калон - 50 сомони</p>', '<p>Works by Tchaikovsky and Rachmaninoff performed by the National Symphony Orchestra under the baton of maestro Firdavs Abdurakhmonov. An unforgettable evening of classical music in world-class acoustics.</p><p><br></p><p>7:00 p.m.</p><p>Grand Hall - 50 somoni</p>', 0, '2025-10-15 19:00:00', 1, 0, 0, '2026-03-02 06:51:58', '2026-03-02 07:59:15'),
(37, 4, 1, 'Вечер таджикской народной музыки', 'Шоми мусиқии мардумии тоҷикӣ', 'An evening of Tajik folk music', 'an-evening-of-tajik-folk-music', 'upload/news/2026-03-02_1772434428_XXL_height.png', '<div>Выступление фольклорного ансамбля \"Шашмаком\" с программой традиционных мелодий и танцев. Погрузитесь в богатую культурную традицию Таджикистана.</div><div><br></div><div>18:30</div><div><br></div><div>Малый зал - 30 сомони</div>', '<p>Барномаи ансамбли мардумии «Шашмаком» бо сурудҳо ва рақсҳои анъанавӣ. Худро дар анъанаи бойи фарҳангии Тоҷикистон ғарқ кунед.</p><p><br></p><p>18:30</p><p>Толори хурд - 30 сомонӣ</p>', '<p>Performance by the Shashmakom folk ensemble with a program of traditional melodies and dances. Immerse yourself in the rich cultural tradition of Tajikistan.</p><p><br></p><p>6:30 p.m.</p><p>Small hall - 30 somoni</p>', 0, '2025-10-25 18:30:00', 1, 0, 0, '2026-03-02 06:53:49', '2026-03-02 08:00:01'),
(38, 4, 1, 'Джазовый фестиваль \"Borbad Jazz\"', 'Фестивали Ҷази Борбад', 'Borbad Jazz Festival', 'borbad-jazz-festival', 'upload/news/2026-03-02_1772434557_XXL_height.png', '<div>Международные джазовые коллективы из Европы и Азии в уникальной акустике зала. Три дня незабываемой музыки от лучших джазменов мира.</div><div><br></div><div>20:00</div><div>Большой зал - 70 сомони</div>', '<p>Ансамблҳои байналмилалии джаз аз Аврупо ва Осиё дар акустикаи беназири толор. Се рӯз мусиқии фаромӯшнашаванда аз беҳтарин мусиқичиёни джази ҷаҳон.</p><p><br></p><p>20:00</p><p>Толори калон - 70 сомонӣ</p>', '<p>International jazz ensembles from Europe and Asia in the unique acoustics of the hall. Three days of unforgettable music from the world\'s best jazz musicians.</p><p><br></p><p>8:00 p.m.</p><p>Grand Hall - 70 somoni</p>', 0, '2025-10-25 20:00:00', 1, 0, 0, '2026-03-02 06:55:58', '2026-03-02 08:00:17'),
(39, 4, 1, 'Концерт популярной музыки', 'Консерти мусиқии маъмулӣ', 'Popular music concert', 'popular-music-concert', 'upload/news/2026-03-02_1772435207_XXL_height.png', '<div>Лучшие поп-исполнители Таджикистана представят новые хиты и классические композиции. Энергичное шоу с современной хореографией.</div><div><br></div><div>19:30</div><div>Большой зал  - 45 сомони</div>', '<p>Беҳтарин поп-иҷрокунандагони Тоҷикистон хитҳои наву композицияҳои классикро пешкаш мекунанд. Намоиши пурэнерҷӣ бо хореографии муосир.</p><p><br></p><p>19:30</p><p>Толори калон - 45 сомонӣ</p>', '<p>Tajikistan\'s best pop performers will present new hits and classic compositions. An energetic show with modern choreography.</p><p><br></p><p>7:30 p.m.</p><p>Grand Hall - 45 somoni</p>', 0, '2025-10-28 19:30:00', 1, 0, 0, '2026-03-02 07:06:48', '2026-03-02 08:00:34'),
(40, 4, 1, 'Оперный гала-концерт', 'Консерти галаи опера', 'Opera gala concert', 'opera-gala-concert', 'upload/news/2026-03-02_1772435325_XXL_height.png', '<div>Известные оперные певцы исполнят арии из мировых шедевров оперного искусства. Вечер великой музыки в исполнении мастеров.</div><div><br></div><div>18:00</div><div>Большой зал - 80 сомони</div>', '<p>Овозхонҳои маъруфи опера арияҳо аз шедеврҳои ҷаҳонии операро иҷро мекунанд. Шаби мусиқии бузург, иҷро аз ҷониби устодон.</p><p><br></p><p>18:00</p><p>Толори калон - 80 сомонӣ</p>', '<p>Renowned opera singers will perform arias from world masterpieces of opera. An evening of great music performed by masters.</p><p><br></p><p>6:00 p.m.</p><p>Grand Hall - 80 somoni</p>', 0, '2025-11-02 18:00:00', 1, 0, 0, '2026-03-02 07:08:45', '2026-03-02 08:00:53'),
(41, 4, 1, 'Танцевальное шоу \"Восточные ритмы\"', 'Намоиши рақс «Ритмҳои Шарқӣ»', 'Dance show “Eastern Rhythms”', 'dance-show-eastern-rhythms', 'upload/news/2026-03-02_1772435410_XXL_height.png', '<div>Традиционные и современные танцевальные коллективы представят красочное шоу. Яркие костюмы, зажигательная музыка и мастерство танцовщиков.</div><div><br></div><div>19:00</div><div>Большой зал  - 35 сомони</div>', '<p>Гурӯҳҳои рақси анъанавӣ ва муосир барномаи рангорангро пешкаш мекунанд. Либосҳои дурахшон, мусиқии ҳаяҷоновар ва маҳорати раққосон.</p><p><br></p><p>19:00</p><p>Толори калон - 35 сомонӣ</p>', '<p>Traditional and modern dance groups will present a colorful show. Bright costumes, lively music, and the skill of the dancers.</p><p><br></p><p>7:00 p.m.</p><p>Grand Hall - 35 somoni</p>', 0, '2025-11-05 19:00:00', 1, 0, 1, '2026-03-02 07:10:11', '2026-03-02 08:01:11');

-- --------------------------------------------------------

--
-- Структура таблицы `news_images`
--

CREATE TABLE `news_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ru` longtext COLLATE utf8mb4_unicode_ci,
  `text_tj` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title_ru`, `title_tj`, `title_en`, `url`, `text_ru`, `text_tj`, `text_en`, `status`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'О нас', 'Оиди мо', 'About us', 'about-us', '<p>О нас</p>', '<p class=\"MsoNormal\" style=\"margin: 6pt 0cm 12pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span lang=\"TG\" style=\"font-size:12.0pt;mso-fareast-font-family:\" times=\"\" new=\"\" roman\";mso-bidi-font-family:=\"\" arial;color:#202122;mso-ansi-language:tg;mso-fareast-language:ru\"=\"\">С</span></b><b><span style=\"font-size:12.0pt;mso-fareast-font-family:\" times=\"\" new=\"\" roman\";mso-bidi-font-family:=\"\" arial;color:#202122;mso-fareast-language:ru\"=\"\">оли таъсиси</span></b><b><span lang=\"TG\" style=\"font-size:12.0pt;mso-fareast-font-family:\" times=\"\" new=\"\" roman\";=\"\" mso-bidi-font-family:arial;color:#202122;mso-ansi-language:tg;mso-fareast-language:=\"\" ru\"=\"\"> МДМ “Кохи Борбад”-и Дастго</span></b><b><span lang=\"TG\" style=\"font-size:\r\n12.0pt;font-family:\" cambria\",serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" mso-bidi-font-family:cambria;color:#202122;mso-ansi-language:tg;mso-fareast-language:=\"\" ru\"=\"\">ҳ</span></b><b><span lang=\"TG\" style=\"font-size:12.0pt;mso-fareast-font-family:\r\n\" times=\"\" new=\"\" roman\";color:#202122;mso-ansi-language:tg;mso-fareast-language:ru\"=\"\">и</span></b><b><span lang=\"TG\" style=\"font-size:12.0pt;mso-fareast-font-family:\" times=\"\" new=\"\" roman\";=\"\" mso-bidi-font-family:arial;color:#202122;mso-ansi-language:tg;mso-fareast-language:=\"\" ru\"=\"\"> </span></b><b><span lang=\"TG\" style=\"font-size:12.0pt;mso-fareast-font-family:\r\n\" times=\"\" new=\"\" roman\";color:#202122;mso-ansi-language:tg;mso-fareast-language:ru\"=\"\">и</span></b><b><span lang=\"TG\" style=\"font-size:12.0pt;font-family:\" cambria\",serif;mso-fareast-font-family:=\"\" \"times=\"\" new=\"\" roman\";mso-bidi-font-family:cambria;color:#202122;mso-ansi-language:=\"\" tg;mso-fareast-language:ru\"=\"\">ҷ</span></b><b><span lang=\"TG\" style=\"font-size:12.0pt;\r\nmso-fareast-font-family:\" times=\"\" new=\"\" roman\";color:#202122;mso-ansi-language:tg;=\"\" mso-fareast-language:ru\"=\"\">роияи</span></b><b><span lang=\"TG\" style=\"font-size:\r\n12.0pt;mso-fareast-font-family:\" times=\"\" new=\"\" roman\";mso-bidi-font-family:arial;=\"\" color:#202122;mso-ansi-language:tg;mso-fareast-language:ru\"=\"\"> Президенти </span></b><b><span lang=\"TG\" style=\"font-size:12.0pt;font-family:\" cambria\",serif;mso-fareast-font-family:=\"\" \"times=\"\" new=\"\" roman\";mso-bidi-font-family:cambria;color:#202122;mso-ansi-language:=\"\" tg;mso-fareast-language:ru\"=\"\">Ҷ</span></b><b><span lang=\"TG\" style=\"font-size:12.0pt;\r\nmso-fareast-font-family:\" times=\"\" new=\"\" roman\";color:#202122;mso-ansi-language:tg;=\"\" mso-fareast-language:ru\"=\"\">ум</span></b><b><span lang=\"TG\" style=\"font-size:12.0pt;\r\nfont-family:\" cambria\",serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" mso-bidi-font-family:cambria;color:#202122;mso-ansi-language:tg;mso-fareast-language:=\"\" ru\"=\"\">ҳ</span></b><b><span lang=\"TG\" style=\"font-size:12.0pt;mso-fareast-font-family:\r\n\" times=\"\" new=\"\" roman\";color:#202122;mso-ansi-language:tg;mso-fareast-language:ru\"=\"\">урии</span></b><b><span lang=\"TG\" style=\"font-size:12.0pt;mso-fareast-font-family:\" times=\"\" new=\"\" roman\";=\"\" mso-bidi-font-family:arial;color:#202122;mso-ansi-language:tg;mso-fareast-language:=\"\" ru\"=\"\"> </span></b><b><span lang=\"TG\" style=\"font-size:12.0pt;mso-fareast-font-family:\r\n\" times=\"\" new=\"\" roman\";color:#202122;mso-ansi-language:tg;mso-fareast-language:ru\"=\"\">То</span></b><b><span lang=\"TG\" style=\"font-size:12.0pt;font-family:\" cambria\",serif;mso-fareast-font-family:=\"\" \"times=\"\" new=\"\" roman\";mso-bidi-font-family:cambria;color:#202122;mso-ansi-language:=\"\" tg;mso-fareast-language:ru\"=\"\">ҷ</span></b><b><span lang=\"TG\" style=\"font-size:12.0pt;\r\nmso-fareast-font-family:\" times=\"\" new=\"\" roman\";color:#202122;mso-ansi-language:tg;=\"\" mso-fareast-language:ru\"=\"\">икистон</span></b></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 12pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:\r\n12.0pt;font-family:\" arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#202122;mso-fareast-language:ru\"=\"\">Соли 1984 тибқи лоиҳаи дастаҷамъонаи\r\nмеъморони Узбекистон&nbsp;</span><a href=\"https://tg.wikipedia.org/w/index.php?title=%D0%A1%D0%B5%D1%80%D0%B3%D0%BE_%D0%A1%D1%83%D1%82%D1%8F%D0%B3%D0%B8%D0%BD&amp;action=edit&amp;redlink=1\" title=\"Серго Сутягин (саҳифа вуҷуд надорад)\"><span style=\"font-size: 12pt; font-family: Arial, sans-serif; color: rgb(191, 60, 44);\">Серго\r\nСутягин</span></a><span style=\"font-size:12.0pt;font-family:\" arial\",sans-serif;=\"\" mso-fareast-font-family:\"times=\"\" new=\"\" roman\";color:#202122;mso-fareast-language:=\"\" ru\"=\"\">, О.&nbsp;В.&nbsp;Легостаева, С.&nbsp;И.&nbsp;Соколов,\r\nС.&nbsp;Н.&nbsp;Романов, Р.&nbsp;С.&nbsp;Ниёзалиева ва муҳандис\r\nА.&nbsp;С.&nbsp;Бресловский бунёд шудааст. Бино дар маркази шаҳри Душанбе, дар\r\nшафати соҳили «Кӯли ҷавонон» ҷой гирифта, намои асосии он ба сӯи&nbsp;</span><a href=\"https://tg.wikipedia.org/wiki/%D0%A5%D0%B8%D1%91%D0%B1%D0%BE%D0%BD%D0%B8_%D0%98%D1%81%D0%BC%D0%BE%D0%B8%D0%BB%D0%B8_%D0%A1%D0%BE%D0%BC%D0%BE%D0%BD%D3%A3\" title=\"Хиёбони Исмоили Сомонӣ\"><span style=\"font-size: 12pt; font-family: Arial, sans-serif; color: rgb(51, 102, 204);\">кӯчаи Исмоили Сомонӣ</span></a><span style=\"font-size:12.0pt;font-family:\" arial\",sans-serif;mso-fareast-font-family:=\"\" \"times=\"\" new=\"\" roman\";color:#202122;mso-fareast-language:ru\"=\"\">&nbsp;нигаронида\r\nшудааст. «Кохи Борбад» аз 2 қисм: миёнсаройи дуошёна ботолори хурд, толори\r\nкалони киноконсертии амфитеатрмонанд (бо 2</span><span lang=\"TG\" style=\"font-size:12.0pt;font-family:\" arial\",sans-serif;mso-fareast-font-family:=\"\" \"times=\"\" new=\"\" roman\";color:#202122;mso-ansi-language:tg;mso-fareast-language:ru\"=\"\">2</span><span style=\"font-size:12.0pt;font-family:\" arial\",sans-serif;mso-fareast-font-family:=\"\" \"times=\"\" new=\"\" roman\";color:#202122;mso-fareast-language:ru\"=\"\">00 ҷои нишаст) ва\r\nутоқҳои хидматрасонӣ иборат аст. Толори калон барои намоиши ҳама гуна филм,\r\nконсертҳои эстрадӣ, фестивалу форум, машварат ва дигар тадбирҳои ҷамъиятию\r\nсиёсӣ таъйин шудааст. Бо таҷҳизоти зарурӣ аз қабили дастгоҳҳои равшанидиҳанда,\r\nтарҷумаи нутқ, системаи муосири акустикӣ-стереофонӣ муҷаҳҳаз аст. Утоқҳо барои\r\nҳунармандон ва ҷои махсус ‒ фарши гирдгардон барои оркестр дорад. Ҳар ду бинои\r\nкох, ки бо қолаби бетони монолитӣ сохта шудаанд, ба заминларзаи 9-балла\r\nтобоваранд. Бинои калони «Кохи Борбад» мудаввари махрутшакл буда, дар қисми\r\nболо шерозаи нақшин дорад, ки хонаҳои сангини ноҳияҳои кӯҳистони Тоҷикистонро\r\nба хотир меоварад.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 12pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:\r\n12.0pt;font-family:\" arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#202122;mso-fareast-language:ru\"=\"\">Меъморону муҳандисон зимни тартиб ва\r\nтаҳияи лоиҳаи «Кохи Борбад» хусусиятҳои расму таомули миллиро ба эътибор\r\nгирифта, кӯшидаанд, ки байни ин бино ва ёдгориҳои меъмории ниёкони тоҷик\r\nмонандӣ вуҷуд дошта бошад.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 12pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">\r\n\r\n\r\n\r\n<b><span lang=\"TG\" style=\"font-size:\r\n12.0pt;mso-fareast-font-family:\" times=\"\" new=\"\" roman\";mso-bidi-font-family:arial;=\"\" color:#202122;mso-ansi-language:tg;mso-fareast-language:ru\"=\"\"><o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 12pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:\r\n12.0pt;font-family:\" arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#202122;mso-fareast-language:ru\"=\"\">Соли 2003 ба муносибати баргузории\r\nФоруми байналмилалии «Оби тоза» (таҳти сарпарастии СММ) бинои «Кохи Борбад»\r\nтаъмиру тармим гардид.</span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 12pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:\r\n12.0pt;font-family:\" arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#202122;mso-fareast-language:ru\"=\"\"><o:p><br></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 3pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size:18.0pt;font-family:&quot;Cambria&quot;,serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:Cambria;\r\ncolor:#101418;mso-fareast-language:RU\">Ҷ</span></b><b><span style=\"font-size:\r\n18.0pt;font-family:&quot;Georgia&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;\r\nmso-bidi-font-family:Georgia;color:#101418;mso-fareast-language:RU\">оиза</span></b><b><span style=\"font-size:18.0pt;font-family:&quot;Cambria&quot;,serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;mso-bidi-font-family:Cambria;color:#101418;mso-fareast-language:\r\nRU\">ҳ</span></b><b><span style=\"font-size:18.0pt;font-family:&quot;Georgia&quot;,serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;mso-bidi-font-family:Georgia;\r\ncolor:#101418;mso-fareast-language:RU\">о</span></b><b><span style=\"font-size:\r\n18.0pt;font-family:&quot;Georgia&quot;,serif;mso-fareast-font-family:&quot;Times New Roman&quot;;\r\nmso-bidi-font-family:&quot;Times New Roman&quot;;color:#101418;mso-fareast-language:RU\"><o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 12pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:\r\n12.0pt;font-family:\" arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#202122;mso-fareast-language:ru\"=\"\">\r\n\r\n</span></p><p class=\"MsoNormal\" style=\"margin: 6pt 0cm 12pt; line-height: normal; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:\r\n12.0pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;\r\ncolor:#202122;mso-fareast-language:RU\">Бо дар назар доштани чунин нозукии\r\nарзишҳои миллӣ соли 1986 дар Озмун-намоиши 5-уми умумииттифоқии меъморон, ки бо\r\nибтикори Иттифоқи меъморони ИҶШС баргузор шуда буд, «Кохи Борбад» яке аз\r\nбеҳтарин иншооти сол дониста шуд.<o:p></o:p></span></p>', 'About us', 1, 0, '2025-10-31 13:28:08', '2026-02-18 04:32:21'),
(9, 'Наши услуги', 'Хизматрасониҳои мо', 'Our services', 'our-services', 'Наши услуги', 'Хизматрасониҳои мо', '<p>Our services</p>', 1, 2, '2026-02-06 12:12:31', '2026-02-06 12:12:31'),
(10, 'Залы', 'Толорҳо', 'Halls', 'halls', 'Залы', 'Толорҳо', 'Halls', 1, 3, '2026-02-06 12:17:07', '2026-02-06 12:17:07'),
(11, 'Контакты', 'Тамос', 'Contacts', 'contacts', 'Контакты', 'Тамос', 'Contacts', 1, 5, '2026-02-06 12:18:10', '2026-02-06 12:18:10'),
(12, 'Вакансия', 'Вакансия', 'Vacancy', 'vacancy', 'Вакансия', 'Вакансия', 'Vacancy', 1, 6, '2026-02-06 12:18:47', '2026-02-06 12:18:47');

-- --------------------------------------------------------

--
-- Структура таблицы `page_images`
--

CREATE TABLE `page_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `page_images`
--

INSERT INTO `page_images` (`id`, `imageable_type`, `imageable_id`, `image`, `sort_order`, `created_at`, `updated_at`) VALUES
(7, 'App\\Models\\Page', 2, '1766421967_694975cfa8e30.png', 1, '2025-12-22 16:46:07', '2025-12-22 16:46:07'),
(8, 'App\\Models\\Page', 2, '1766422065_6949763128b1e.png', 2, '2025-12-22 16:47:45', '2025-12-22 16:47:45'),
(9, 'App\\Models\\Page', 2, '1766422072_69497638f3433.png', 3, '2025-12-22 16:47:52', '2025-12-22 16:47:52');

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(33, 'media.index', 'web', 'media', '2025-12-04 09:35:03', '2025-12-04 09:37:54'),
(34, 'menu.menu', 'web', 'menu', '2025-12-04 09:35:27', '2025-12-04 10:09:22'),
(35, 'menu.list', 'web', 'menu', '2025-12-04 10:09:38', '2025-12-04 10:09:38'),
(36, 'menu.add', 'web', 'menu', '2025-12-04 10:09:51', '2025-12-04 10:09:51'),
(37, 'menu.edit', 'web', 'menu', '2025-12-04 10:10:04', '2025-12-04 10:10:04'),
(38, 'menu.delete', 'web', 'menu', '2025-12-04 10:10:16', '2025-12-04 10:10:16'),
(39, 'submenu.menu', 'web', 'submenu', '2025-12-04 10:10:38', '2025-12-04 10:10:38'),
(40, 'submenu.list', 'web', 'submenu', '2025-12-04 10:10:49', '2025-12-04 10:10:49'),
(41, 'submenu.add', 'web', 'submenu', '2025-12-04 10:10:59', '2025-12-04 10:10:59'),
(42, 'submenu.edit', 'web', 'submenu', '2025-12-04 10:11:09', '2025-12-04 10:11:09'),
(43, 'submenu.delete', 'web', 'submenu', '2025-12-04 10:11:19', '2025-12-04 10:11:19'),
(44, 'leader.menu', 'web', 'leader', '2025-12-04 10:11:39', '2025-12-04 10:11:39'),
(45, 'leader.list', 'web', 'leader', '2025-12-04 10:11:52', '2025-12-04 10:11:52'),
(46, 'leader.add', 'web', 'leader', '2025-12-04 10:12:02', '2025-12-04 10:12:02'),
(47, 'leader.edit', 'web', 'leader', '2025-12-04 10:12:11', '2025-12-04 10:12:11'),
(48, 'leader.delete', 'web', 'leader', '2025-12-04 10:12:24', '2025-12-04 10:12:24'),
(49, 'category.menu', 'web', 'category', '2025-12-04 10:19:15', '2025-12-04 10:19:15'),
(50, 'category.list', 'web', 'category', '2025-12-04 10:19:24', '2025-12-04 10:19:24'),
(51, 'category.add', 'web', 'category', '2025-12-04 10:19:35', '2025-12-04 10:19:35'),
(52, 'category.edit', 'web', 'category', '2025-12-04 10:19:44', '2025-12-04 10:19:44'),
(53, 'category.delete', 'web', 'category', '2025-12-04 10:19:53', '2025-12-04 10:19:53'),
(54, 'links.menu', 'web', 'links', '2025-12-04 10:20:15', '2025-12-04 10:20:15'),
(55, 'links.list', 'web', 'links', '2025-12-04 10:20:26', '2025-12-04 10:20:26'),
(56, 'links.add', 'web', 'links', '2025-12-04 10:20:36', '2025-12-04 10:20:36'),
(57, 'links.edit', 'web', 'links', '2025-12-04 10:20:45', '2025-12-04 10:20:45'),
(58, 'links.delete', 'web', 'links', '2025-12-04 10:20:55', '2025-12-04 10:20:55'),
(59, 'news.menu', 'web', 'news', '2025-12-04 10:21:16', '2025-12-04 10:21:16'),
(60, 'news.list', 'web', 'news', '2025-12-04 10:21:24', '2025-12-04 10:21:24'),
(61, 'news.add', 'web', 'news', '2025-12-04 10:21:34', '2025-12-04 10:21:34'),
(62, 'news.edit', 'web', 'news', '2025-12-04 10:21:43', '2025-12-04 10:21:43'),
(63, 'news.delete', 'web', 'news', '2025-12-04 10:21:56', '2025-12-04 10:21:56'),
(64, 'video.menu', 'web', 'video', '2025-12-04 10:22:19', '2025-12-04 10:22:19'),
(65, 'video.list', 'web', 'video', '2025-12-04 10:22:29', '2025-12-04 10:22:29'),
(66, 'video.add', 'web', 'video', '2025-12-04 10:23:02', '2025-12-04 10:23:02'),
(67, 'video.edit', 'web', 'video', '2025-12-04 10:26:34', '2025-12-04 10:26:34'),
(68, 'video.delete', 'web', 'video', '2025-12-04 10:26:44', '2025-12-04 10:26:44'),
(69, 'gallery.menu', 'web', 'gallery', '2025-12-04 10:27:04', '2025-12-04 10:27:04'),
(70, 'gallery.list', 'web', 'gallery', '2025-12-04 10:27:15', '2025-12-04 10:27:15'),
(71, 'gallery.add', 'web', 'gallery', '2025-12-04 10:27:25', '2025-12-04 10:27:25'),
(72, 'gallery.edit', 'web', 'gallery', '2025-12-04 10:27:34', '2025-12-04 10:27:34'),
(73, 'gallery.delete', 'web', 'gallery', '2025-12-04 10:27:44', '2025-12-04 10:27:44'),
(74, 'presidents.menu', 'web', 'presidents', '2025-12-04 10:28:05', '2025-12-04 10:28:05'),
(75, 'presidents.list', 'web', 'presidents', '2025-12-04 10:28:14', '2025-12-04 10:28:14'),
(76, 'presidents.add', 'web', 'presidents', '2025-12-04 10:28:25', '2025-12-04 10:28:25'),
(77, 'presidents.edit', 'web', 'presidents', '2025-12-04 10:28:34', '2025-12-04 10:28:34'),
(78, 'presidents.delete', 'web', 'presidents', '2025-12-04 10:28:44', '2025-12-04 10:28:44'),
(79, 'projects.menu', 'web', 'projects', '2025-12-04 10:29:06', '2025-12-04 10:29:06'),
(80, 'projects.list', 'web', 'projects', '2025-12-04 10:29:17', '2025-12-04 10:29:17'),
(81, 'projects.add', 'web', 'projects', '2025-12-04 10:29:28', '2025-12-04 10:29:28'),
(82, 'projects.edit', 'web', 'projects', '2025-12-04 10:29:38', '2025-12-04 10:29:38'),
(83, 'projects.delete', 'web', 'projects', '2025-12-04 10:29:48', '2025-12-04 10:29:48'),
(84, 'tasks.menu', 'web', 'tasks', '2025-12-04 10:30:14', '2025-12-04 10:30:14'),
(85, 'tasks.list', 'web', 'tasks', '2025-12-04 10:30:23', '2025-12-04 10:30:23'),
(86, 'tasks.add', 'web', 'tasks', '2025-12-04 10:30:34', '2025-12-04 10:30:34'),
(87, 'tasks.edit', 'web', 'tasks', '2025-12-04 10:32:37', '2025-12-04 10:32:37'),
(88, 'tasks.delete', 'web', 'tasks', '2025-12-04 10:32:46', '2025-12-04 10:32:46'),
(89, 'services.menu', 'web', 'services', '2025-12-04 10:35:06', '2025-12-04 10:35:06'),
(90, 'services.list', 'web', 'services', '2025-12-04 10:35:16', '2025-12-04 10:35:16'),
(91, 'services.add', 'web', 'services', '2025-12-04 10:35:28', '2025-12-04 10:35:28'),
(92, 'services.edit', 'web', 'services', '2025-12-04 10:35:37', '2025-12-04 10:35:37'),
(93, 'services.delete', 'web', 'services', '2025-12-04 10:35:45', '2025-12-04 10:35:45'),
(94, 'surveys.menu', 'web', 'surveys', '2025-12-04 10:36:14', '2025-12-04 10:36:14'),
(95, 'surveys.list', 'web', 'surveys', '2025-12-04 10:36:23', '2025-12-04 10:36:23'),
(96, 'surveys.add', 'web', 'surveys', '2025-12-04 10:36:36', '2025-12-04 10:36:36'),
(97, 'surveys.edit', 'web', 'surveys', '2025-12-04 10:36:46', '2025-12-04 10:36:46'),
(98, 'surveys.delete', 'web', 'surveys', '2025-12-04 10:37:00', '2025-12-04 10:37:00'),
(99, 'contacts.menu', 'web', 'contacts', '2025-12-04 10:37:21', '2025-12-04 10:37:21'),
(100, 'contacts.list', 'web', 'contacts', '2025-12-04 10:37:30', '2025-12-04 10:37:30'),
(101, 'contacts.add', 'web', 'contacts', '2025-12-04 10:37:38', '2025-12-04 10:37:38'),
(102, 'contacts.edit', 'web', 'contacts', '2025-12-04 10:37:47', '2025-12-04 10:37:47'),
(103, 'contacts.delete', 'web', 'contacts', '2025-12-04 10:37:57', '2025-12-04 10:37:57'),
(104, 'jobs.menu', 'web', 'jobs', '2025-12-04 10:38:21', '2025-12-04 10:38:21'),
(105, 'jobs.list', 'web', 'jobs', '2025-12-04 10:38:32', '2025-12-04 10:38:32'),
(106, 'jobs.add', 'web', 'jobs', '2025-12-04 10:38:42', '2025-12-04 10:38:42'),
(107, 'jobs.edit', 'web', 'jobs', '2025-12-04 10:38:54', '2025-12-04 10:38:54'),
(108, 'jobs.delete', 'web', 'jobs', '2025-12-04 10:39:04', '2025-12-04 10:39:04'),
(109, 'documents.menu', 'web', 'documents', '2025-12-04 10:39:25', '2025-12-04 10:39:25'),
(110, 'documents.list', 'web', 'documents', '2025-12-04 10:39:34', '2025-12-04 10:39:34'),
(111, 'documents.add', 'web', 'documents', '2025-12-04 10:39:43', '2025-12-04 10:39:43'),
(112, 'documents.edit', 'web', 'documents', '2025-12-04 10:39:51', '2025-12-04 10:39:51'),
(113, 'documents.delete', 'web', 'documents', '2025-12-04 10:39:59', '2025-12-04 10:39:59'),
(114, 'setting.menu', 'web', 'setting', '2025-12-04 10:41:58', '2025-12-04 10:41:58'),
(115, 'admin.menu', 'web', 'admin', '2025-12-04 10:42:34', '2025-12-04 10:42:34'),
(116, 'admin.list', 'web', 'admin', '2025-12-04 10:42:45', '2025-12-04 10:42:45'),
(117, 'admin.add', 'web', 'admin', '2025-12-04 10:42:55', '2025-12-04 10:42:55'),
(118, 'admin.edit', 'web', 'admin', '2025-12-04 10:43:06', '2025-12-04 10:43:06'),
(119, 'admin.delete', 'web', 'admin', '2025-12-04 10:44:02', '2025-12-04 10:44:02'),
(120, 'all_permission', 'web', 'permission', '2025-12-04 10:46:19', '2025-12-04 10:46:19'),
(121, 'all_roles', 'web', 'roles', '2025-12-04 10:46:46', '2025-12-04 10:46:46'),
(122, 'add_roles_permission', 'web', 'add_roles_permission', '2025-12-04 10:47:08', '2025-12-04 10:47:08'),
(123, 'all_roles_permission', 'web', 'all_roles_permission', '2025-12-04 10:47:33', '2025-12-04 10:47:33'),
(124, 'static_translations_index', 'web', 'static_translations', '2025-12-09 10:55:56', '2025-12-09 10:55:56'),
(125, 'static_translations_list', 'web', 'static_translations', '2025-12-10 08:49:55', '2025-12-10 08:49:55'),
(126, 'static_translations_add', 'web', 'static_translations', '2025-12-10 08:50:08', '2025-12-10 08:50:08'),
(127, 'static_translations_edit', 'web', 'static_translations', '2025-12-10 08:50:25', '2025-12-10 08:50:25'),
(128, 'static_translations_delete', 'web', 'static_translations', '2025-12-10 08:50:41', '2025-12-10 08:50:41'),
(129, 'setting.update', 'web', 'setting', '2025-12-10 08:53:09', '2025-12-10 08:53:09');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `presidents`
--

CREATE TABLE `presidents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_ru` text COLLATE utf8mb4_unicode_ci,
  `text_tj` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `views` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `presidents`
--

INSERT INTO `presidents` (`id`, `title_ru`, `title_tj`, `title_en`, `slug`, `image`, `text_ru`, `text_tj`, `text_en`, `views`, `status`, `sort`, `created_at`, `updated_at`) VALUES
(2, 'Президент Республики Таджикистан', 'Президенти Ҷумҳурии Тоҷикистон', 'President of the Republic of Tajikistan', 'title-en', 'upload/presidents/20251222_215505_president (1).jpg', '<p>Одним из ключевых вопросов культурной политики страны в сложных условиях современного мира является сохранение и правильное использование исторического и культурного наследия нашего народа, а также национальных праздников и традиций.</p>', '<p><span style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;\"=\"\">Яке аз масъалаҳои муҳими сиёсати фарҳангии кишвар дар шароити мураккаби ҷаҳони муосир ҳифз ва истифодаи дурусти мероси таърихию фарҳангии халқамон ва ҷашну суннатҳои миллӣ мебошанд.</span></p>', '<p>One of the key issues in the country\'s cultural policy, in the complex context of the modern world, is the preservation and proper use of our nation\'s historical and cultural heritage and national celebrations and traditions.</p>', 0, 1, 1, '2025-11-03 05:21:13', '2026-02-06 08:46:21');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2023-05-03 07:28:05', '2023-05-03 08:05:20'),
(2, 'admin', 'web', '2023-05-03 07:28:28', '2023-05-03 07:28:28'),
(3, 'Editor', 'web', '2023-05-03 07:28:38', '2023-05-03 07:28:38'),
(4, 'Reporter', 'web', '2023-05-03 07:28:55', '2023-05-03 07:28:55');

-- --------------------------------------------------------

--
-- Структура таблицы `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2),
(73, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(83, 2),
(84, 2),
(85, 2),
(86, 2),
(87, 2),
(88, 2),
(89, 2),
(90, 2),
(91, 2),
(92, 2),
(93, 2),
(94, 2),
(95, 2),
(96, 2),
(97, 2),
(98, 2),
(99, 2),
(100, 2),
(101, 2),
(102, 2),
(103, 2),
(104, 2),
(105, 2),
(106, 2),
(107, 2),
(108, 2),
(109, 2),
(110, 2),
(111, 2),
(112, 2),
(113, 2),
(114, 2),
(115, 2),
(116, 2),
(117, 2),
(124, 2),
(125, 2),
(126, 2),
(127, 2),
(128, 2),
(129, 2),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(47, 3),
(48, 3),
(49, 3),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 3),
(55, 3),
(56, 3),
(57, 3),
(58, 3),
(59, 3),
(60, 3),
(61, 3),
(62, 3),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(70, 3),
(71, 3),
(72, 3),
(73, 3),
(74, 3),
(75, 3),
(76, 3),
(77, 3),
(78, 3),
(79, 3),
(80, 3),
(81, 3),
(82, 3),
(83, 3),
(84, 3),
(85, 3),
(86, 3),
(87, 3),
(88, 3),
(89, 3),
(90, 3),
(91, 3),
(92, 3),
(93, 3),
(94, 3),
(95, 3),
(96, 3),
(97, 3),
(98, 3),
(99, 3),
(100, 3),
(101, 3),
(102, 3),
(103, 3),
(104, 3),
(105, 3),
(106, 3),
(107, 3),
(108, 3),
(109, 3),
(110, 3),
(111, 3),
(112, 3),
(113, 3),
(114, 3),
(34, 4),
(35, 4),
(39, 4),
(40, 4),
(44, 4),
(45, 4),
(49, 4),
(50, 4),
(54, 4),
(55, 4),
(59, 4),
(60, 4),
(64, 4),
(65, 4),
(69, 4),
(70, 4),
(74, 4),
(75, 4),
(79, 4),
(80, 4),
(84, 4),
(85, 4),
(89, 4),
(90, 4),
(94, 4),
(95, 4),
(99, 4),
(100, 4),
(104, 4),
(105, 4),
(109, 4),
(110, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ru` text COLLATE utf8mb4_unicode_ci,
  `text_tj` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `views` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `title_ru`, `title_tj`, `title_en`, `slug`, `icon`, `text_ru`, `text_tj`, `text_en`, `views`, `status`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Аренда зала', 'Иҷораи толор', 'Hall rental', 'hall-rental', NULL, 'Текст RU', 'Текст TJ', 'Текст EN', 0, 1, 1, '2026-02-13 06:30:25', '2026-02-13 06:30:25');

-- --------------------------------------------------------

--
-- Структура таблицы `service_requests`
--

CREATE TABLE `service_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_tj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_hours_weekdays` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_hours_weekend` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_hours_box` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_map` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `street_ru`, `street_tj`, `street_en`, `title_ru`, `title_en`, `title_tj`, `phone`, `email`, `logo`, `facebook`, `twitter`, `telegram`, `instagram`, `youtube`, `working_hours_weekdays`, `working_hours_weekend`, `working_hours_box`, `contact_title`, `contact_detail`, `contact_map`, `created_at`, `updated_at`) VALUES
(1, 'пр. И. Сомони, 26, Душанбе', 'Ул. И. Сомония, 26, Душанбе', '26 I. Somanī Street, Dushanbe', 'Дворец Борбада', 'The Palace of Borbad', 'Кохи Борбад', '+992 372 27 09 46', 'info@borbad.tj', 'upload/logo/logo_1770380455.png', 'https://www.facebook.com/borbad/', 'https://twitter.com/borbad', 'https://telegram.org/borbad', 'https://www.instagram.com/borbad', 'https://youtube.com/borbad', NULL, NULL, NULL, 'Контакт', '+992 372 27 09 46', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2301.382669419986!2d32.02417099376721!3d54.77323999672319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46ce580520d36a2d%3A0x9e70622a8865bd84!2z0KPQv9GA0LDQstC70LXQvdC40LUg0JzQtdC70LjQvtGA0LDRhtC40Lgg0JfQtdC80LXQu9GMINCYINCh0LXQu9GM0YHQutC-0YXQvtC30Y_QudGB0YLQstC10L3QvdC-0LPQviDQktC-0LTQvtGB0L3QsNCx0LbQtdC90LjRjw!5e0!3m2!1sru!2s!4v1762241795793!5m2!1sru!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2025-11-04 07:25:51', '2026-02-06 12:20:55');

-- --------------------------------------------------------

--
-- Структура таблицы `static_translations`
--

CREATE TABLE `static_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_tj` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `static_translations`
--

INSERT INTO `static_translations` (`id`, `key`, `value_ru`, `value_en`, `value_tj`, `group`, `description`, `created_at`, `updated_at`) VALUES
(1, 'show_all_responsibilities', 'Показать все обязанности', 'Show All Responsibilities', 'Ҳамаи вазифаҳоро нишон диҳед', 'buutons', 'Кнопка для показа всех обязанностей', '2025-12-09 08:14:54', '2025-12-09 08:16:09'),
(2, 'read_more', 'Подробнее', 'Read more', 'Муфассалтар', 'buutons', 'Подробнее', '2025-12-09 08:15:17', '2026-02-13 07:00:58'),
(3, 'learn_more', 'Узнать больше', 'Learn more', 'Маълумоти бештар', 'buutons', 'Кнопка \"Узнать больше\"', '2025-12-09 08:15:43', '2025-12-09 08:15:43'),
(4, 'contact_us', 'Свяжитесь с нами', 'Contact us', 'Бо мо тамос гиред', 'buutons', 'Кнопка контактов', '2025-12-09 08:16:45', '2025-12-09 08:16:45'),
(5, 'our_services', 'Наши услуги', 'Our Services', 'Хизматҳои мо', 'title', 'Заголовок секции услуг', '2025-12-09 08:17:19', '2025-12-09 08:17:19'),
(6, 'main_responsibilities', 'ОСНОВНЫЕ ОБЯЗАННОСТИ', 'MAIN RESPONSIBILITIES', 'Масъулиятҳои асосӣ', 'title', 'Заголовок  Секция  ОСНОВНЫЕ ОБЯЗАННОСТИ', '2025-12-09 08:17:58', '2025-12-09 08:18:08'),
(7, 'main_news', 'Новости', 'News', 'Ахбор', 'title', 'СЕКЦИЯ НОВОСТЕЙ', '2025-12-09 08:18:45', '2025-12-09 08:18:45'),
(8, 'main_video', 'Видео', 'Video', 'Видео', 'title', 'СЕКЦИЯ VIDEO', '2025-12-09 08:19:07', '2025-12-09 08:19:07'),
(9, 'all_video', 'Все видео', 'All videos', 'Ҳамаи видео', 'title', 'Кнопка Все видео', '2025-12-09 08:19:35', '2025-12-09 08:19:35'),
(10, 'main_gallery', 'Фотогалерея', 'Photo Gallery', 'Галереяи аксҳо', 'title', 'Кнпока 	Фотогалерея', '2025-12-09 08:19:58', '2025-12-09 08:19:58'),
(11, 'leadership', 'Руководство', 'Leadership', 'Роҳбарият', 'title', 'Кнпока 	РУКОВОДСТВО', '2025-12-09 08:20:55', '2025-12-09 08:20:55'),
(12, 'citizen_requests', 'Обратная связь', 'Feedback', 'Фикру мулоҳиза', 'title', 'кнопка Обратная связь', '2025-12-09 08:21:26', '2026-02-13 04:20:23'),
(13, 'send_button', 'Отправить', 'Send', 'Ирсол кардан', 'buutons', 'Кнопка отправить для формы', '2025-12-09 08:22:09', '2025-12-09 08:22:09'),
(14, 'our_partners', 'Наши партнёры', 'Our partners', 'Шарикони мо', 'title', 'кнопка 	Наши партнёры', '2025-12-09 08:23:36', '2025-12-09 08:23:36'),
(15, 'projects', 'Проекты', 'Projects', 'Лоиҳаҳо', 'title', 'кнопка Проекты', '2025-12-09 08:26:35', '2025-12-09 08:26:47'),
(16, 'vote', 'Голосовать', 'Vote', 'Овоз дихед', 'buutons', 'кнопка для голосования', '2025-12-09 08:30:40', '2025-12-09 08:30:40'),
(17, 'search_news', 'Поиск по новостям', 'Search news', 'Ҷустуҷӯ дар хабарҳо', 'buutons', 'Поиск по новостям', '2025-12-09 09:06:32', '2025-12-09 09:06:32'),
(18, 'our_projects', 'Наши проекты', 'Our Projects', 'Лоиҳаҳои мо', 'title', 'Наши проекты', '2025-12-09 09:15:53', '2025-12-09 09:15:53'),
(19, 'contact', 'Конакты', 'Contact', 'Тамос', 'title', 'Конакты', '2025-12-09 09:19:19', '2025-12-09 09:19:19'),
(20, 'documents', 'Документы', 'Documents', 'Ҳуҷҷатҳо', 'title', 'Документы', '2025-12-09 09:21:16', '2025-12-09 09:21:16'),
(21, 'back', 'Назад', 'Back', 'Баргаштан', 'buutons', 'Назад к списку', '2025-12-09 09:23:40', '2025-12-09 09:23:40'),
(22, 'biography', 'Биография', 'Biography', 'Тарҷумаи ҳол', 'title', 'Биография', '2025-12-09 09:26:22', '2025-12-09 09:26:22'),
(23, 'all_news', 'Все новости', 'All News', 'Ҳамаи хабарҳо', 'buutons', 'Все новости', '2025-12-09 09:29:39', '2025-12-09 09:29:39'),
(24, 'other_news', 'Другие новости', 'Other News', 'Дигар хабарҳо', 'title', 'Другие новости', '2025-12-09 09:30:47', '2025-12-09 09:30:47'),
(25, 'vacancies', 'Вакансии', 'Vacancies', 'Ҷойҳои кории холӣ', 'title', 'Вакансии', '2025-12-09 09:56:10', '2025-12-09 09:56:10'),
(26, 'apply', 'Подать заявку', 'Apply', 'Аризадиҳӣ', 'title', 'Подать заявку', '2025-12-09 09:58:16', '2025-12-09 09:58:16'),
(27, 'upcoming_events', 'Ближайшие события', 'Upcoming events', 'Чорабиниҳои оянда', 'title', 'Ближайшие события', '2026-02-06 11:21:32', '2026-02-06 11:21:32'),
(28, 'outstanding_performances_title', 'Выдающиеся выступления и премьеры месяца', 'Outstanding performances and premieres of the month', 'Иҷроишҳои барҷаста ва премьераҳои моҳ', 'title', 'Выдающиеся выступления и премьеры месяца', '2026-02-06 11:23:10', '2026-02-06 11:23:10'),
(29, 'Immerse_yourself_title', 'Погрузитесь в атмосферу наших выступлений', 'Immerse yourself in the atmosphere of our performances', 'Худро дар фазои намоишҳои мо ғарқ кунед', 'title', 'Погрузитесь в атмосферу наших выступлений', '2026-02-06 11:25:28', '2026-02-06 11:25:28'),
(30, 'about_our_history', 'Концертный зал', 'Concert hall', 'Толори консертӣ', 'title', 'Заголовок', '2026-02-11 12:59:27', '2026-02-11 12:59:27'),
(31, 'about_values', 'Наша миссия', 'Our mission', 'Миссияи мо', 'title', 'Наша миссия', '2026-02-11 13:01:14', '2026-02-11 13:01:14'),
(32, 'about_development_path', 'История развития', 'History of development', 'Таърихи рушд', 'title', 'История развития', '2026-02-11 13:02:09', '2026-02-11 13:02:09'),
(33, 'footer_weekdays', 'Пн — Пт', 'Mon–Fri', 'Душ —Ҷум', 'title', 'Пн — Пт', '2026-02-12 09:34:27', '2026-02-13 06:19:33'),
(34, 'footer_weekend', 'Сб — Вс', 'Sat — Sun', 'Шанбе — Якшанбе', 'title', 'Выходной', '2026-02-12 09:35:51', '2026-02-12 09:35:51'),
(35, 'footer_box_note', 'Касса работает за 1 час до начала мероприятия', 'The ticket office opens one hour before the start of the event.', 'Билетфурӯшӣ як соат пеш аз оғози чорабинӣ кушода мешавад.', 'title', 'Касса работает', '2026-02-12 09:39:46', '2026-02-12 09:39:46'),
(36, 'footer_description', 'Театрально-концертный зал «Кохи Борбад» — культурное сердце Душанбе. Место, где оживают эмоции и рождается искусство.', 'The Kochi Borbad Theater and Concert Hall is the cultural heart of Dushanbe. It is a place where emotions come alive and art is born.', 'Театри Кохи Борбад ва толори консертӣ қалби фарҳангии Душанбе аст. Ин маконест, ки дар он эҳсосот зинда мешаванд ва санъат ба вуҷуд меояд.', 'title', 'Театрально-концертный зал «Кохи Борбад»', '2026-02-12 10:11:47', '2026-02-12 10:11:47'),
(37, 'about_page_title', 'О нас - Борбад', 'About us - Borbad', 'Дар бораи мо - Борбад', 'about', 'Страница О нас: заголовок вкладки браузера', '2026-02-12 11:45:55', '2026-02-12 11:45:55'),
(38, 'about_our_mission', 'Наша миссия', 'Our mission', 'Миссияи мо', 'about', 'Страница О нас: заголовок блока миссии', '2026-02-12 11:45:55', '2026-02-12 11:45:55'),
(39, 'about_development_history', 'История развития', 'Development history', 'Таърихи рушд', 'about', 'Страница О нас: заголовок блока истории', '2026-02-12 11:45:55', '2026-02-12 11:45:55'),
(40, 'about_mission_empty', 'Блок миссии пока не заполнен. Заполните в ', 'Mission block is empty. Fill it in ', 'Блоки миссия то ҳол пур нашудааст. Дар ', 'about', 'Страница О нас: пустой блок миссии', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(41, 'about_admin_link', 'админке', 'admin panel', 'админка', 'about', 'Страница О нас: текст ссылки на админку', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(42, 'about_history_empty', 'Блок истории пока не заполнен.', 'History block is empty.', 'Блоки таърих то ҳол пур нашудааст.', 'about', 'Страница О нас: пустой блок истории', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(43, 'about_block_fill_admin', 'Содержание блока можно заполнить в ', 'Block content can be filled in ', 'Мундариҷаи блокро дар ', 'about', 'Страница О нас: подсказка заполнить блок', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(44, 'about_in_admin_panel', ' админ-панели.', ' admin panel.', ' админка пур карда мешавад.', 'about', 'Страница О нас: окончание фразы про админку', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(45, 'about_stats_empty', 'Блок статистики пока не заполнен.', 'Statistics block is empty.', 'Блоки омор то ҳол пур нашудааст.', 'about', 'Страница О нас: пустой блок статистики', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(46, 'footer_navigation', 'Навигация', 'Navigation', 'Навигатсия', 'footer', 'Футер: заголовок блока навигации', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(47, 'footer_home', 'Главная', 'Home', 'Асосӣ', 'footer', 'Футер: пункт меню', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(48, 'footer_afisha', 'Афиша', 'Event Schedule', 'Афиша', 'footer', 'Футер: пункт меню', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(49, 'footer_about', 'О нас', 'About us', 'Дар бораи мо', 'footer', 'Футер: пункт меню', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(50, 'footer_gallery', 'Галерея', 'Gallery', 'Галерея', 'footer', 'Футер: пункт меню', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(51, 'footer_contacts', 'Контакты', 'Contacts', 'Тамос', 'footer', 'Футер: пункт меню и заголовок блока', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(52, 'footer_working_hours', 'Режим работы', 'Working hours', 'Соати кор', 'footer', 'Футер: заголовок блока режима работы', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(53, 'footer_copyright', 'Все права защищены', 'All rights reserved', 'Ҳамаи ҳуқуқҳо ҳифз шудаанд', 'footer', 'Футер: копирайт', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(54, 'footer_bottom_text', 'Театрально-концертный зал «Борбад», г. Душанбе', 'Borbad Concert Hall, Dushanbe', 'Залу консертии «Борбад», ш. Душанбе', 'footer', 'Футер: текст внизу', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(55, 'footer_address_default', 'г. Душанбе, Таджикистан', 'Dushanbe, Tajikistan', 'ш. Душанбе, Тоҷикистон', 'footer', 'Футер: адрес по умолчанию (если не задан в настройках)', '2026-02-12 11:45:56', '2026-02-12 11:45:56'),
(56, 'write_to _us', 'Напишите нам, и мы ответим в ближайшее время', 'Write to us and we will respond as soon as possible.', 'Ба мо нависед ва мо ҳарчи зудтар посух медиҳем.', 'title', 'заголовок', '2026-02-13 04:22:46', '2026-02-13 04:22:46'),
(57, 'your_name_title', 'Ваше имя', 'Your name', 'Номи шумо', 'title', 'Ваше имя', '2026-02-13 04:24:31', '2026-02-13 04:24:31'),
(58, 'phone_title', 'Телефон', 'Phone', 'Телефон', 'title', 'Телефон', '2026-02-13 04:25:09', '2026-02-13 04:25:09'),
(59, 'subject_title', 'Тема обращения', 'Subject of the appeal', 'Мавзӯи', 'title', 'Тема обращения', '2026-02-13 04:26:53', '2026-02-13 04:26:53'),
(60, 'tickets_title_purchasing', 'Покупка билетов', 'Purchasing tickets', 'Хариди чиптаҳо', 'title', 'Покупка билетов', '2026-02-13 04:27:57', '2026-02-13 04:27:57'),
(61, 'cooperation_title', 'Сотрудничество', 'Cooperation', 'Ҳамкорӣ', 'title', 'Сотрудничество', '2026-02-13 04:29:00', '2026-02-13 04:29:00'),
(62, 'rent_title', 'Аренда зала', 'Hall rental', 'Иҷораи толор', 'title', 'Аренда зала', '2026-02-13 04:29:49', '2026-02-13 04:29:49'),
(63, 'general_questions_title', 'Общие вопросы', 'General questions', 'Саволҳои умумӣ', 'title', 'Общие вопросы', '2026-02-13 04:30:37', '2026-02-13 04:30:37'),
(64, 'other_title', 'Другое', 'Other', 'Дигар', 'title', 'Другое', '2026-02-13 04:32:07', '2026-02-13 04:32:07'),
(65, 'message_title', 'Сообщение', 'Message', 'Паём', 'title', 'Сообщение', '2026-02-13 04:34:57', '2026-02-13 04:34:57'),
(66, 'cashbox', 'Касса', 'Cash desk', 'Касса', 'title', 'Касса', '2026-02-13 05:49:15', '2026-02-13 05:49:15'),
(67, 'cashbox_hours', 'За 2 часа до начала мероприятия', '2 hours before the start of the event', 'Ду соат пеш аз оғози чорабинӣ', 'title', 'За 2 часа до начала мероприятия', '2026-02-13 06:16:12', '2026-02-13 06:16:12'),
(68, 'view_all_events', 'Вся афиша', 'The entire program', 'Ҳамаи барнома', 'title', 'Вся афиша', '2026-02-13 06:57:14', '2026-02-13 06:57:14');

-- --------------------------------------------------------

--
-- Структура таблицы `sub_pages`
--

CREATE TABLE `sub_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ru` longtext COLLATE utf8mb4_unicode_ci,
  `text_tj` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sub_pages`
--

INSERT INTO `sub_pages` (`id`, `page_id`, `title_ru`, `title_tj`, `title_en`, `url`, `text_ru`, `text_tj`, `text_en`, `status`, `sort`, `created_at`, `updated_at`) VALUES
(1, 1, 'Руководство', 'Идоракунӣ', 'Management', 'management', '<h2 style=\"margin-top: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Что такое Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: \"Open Sans\", Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong> - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: \"Open Sans\", Arial, sans-serif;\"><br></p><h2 style=\"margin-top: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Откуда он появился?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: \"Open Sans\", Arial, sans-serif;\">Многие думают, что Lorem Ipsum - взятый с потолка псевдо-латинский набор слов, но это не совсем так. Его корни уходят в один фрагмент классической латыни 45 года н.э., то есть более двух тысячелетий назад. Ричард МакКлинток, профессор латыни из колледжа Hampden-Sydney, штат Вирджиния, взял одно из самых странных слов в Lorem Ipsum, \"consectetur\", и занялся его поисками в классической латинской литературе. В результате он нашёл неоспоримый первоисточник Lorem Ipsum в разделах 1.10.32 и 1.10.33 книги \"de Finibus Bonorum et Malorum\" (\"О пределах добра и зла\"), написанной Цицероном в 45 году н.э. Этот трактат по теории этики был очень популярен в эпоху Возрождения. Первая строка Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", происходит от одной из строк в разделе 1.10.32</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: \"Open Sans\", Arial, sans-serif;\">Классический текст Lorem Ipsum, используемый с XVI века, приведён ниже. Также даны разделы 1.10.32 и 1.10.33 \"de Finibus Bonorum et Malorum\" Цицерона и их английский перевод, сделанный H. Rackham, 1914 год.<br><br><br></p><h2 style=\"margin-top: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Почему он используется?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: \"Open Sans\", Arial, sans-serif;\">Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).<br><br></p><h2 style=\"margin-top: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Где его взять?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: \"Open Sans\", Arial, sans-serif;\">Есть много вариантов Lorem Ipsum, но большинство из них имеет не всегда приемлемые модификации, например, юмористические вставки или слова, которые даже отдалённо не напоминают латынь. Если вам нужен Lorem Ipsum для серьёзного проекта, вы наверняка не хотите какой-нибудь шутки, скрытой в середине абзаца. Также все другие известные генераторы Lorem Ipsum используют один и тот же текст, который они просто повторяют, пока не достигнут нужный объём. Это делает предлагаемый здесь генератор единственным настоящим Lorem Ipsum генератором. Он использует словарь из более чем 200 латинских слов, а также набор моделей предложений. В результате сгенерированный Lorem Ipsum выглядит правдоподобно, не имеет повторяющихся абзацей или \"невозможных\" слов.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: \"Open Sans\", Arial, sans-serif;\"><br><br></p>', 'ТЕКСТ TJ', '<p>                                              ТЕКСТ EN\r\n                                        </p>', 1, 1, '2025-11-01 06:01:45', '2025-12-22 12:40:59');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user','editor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fira', 'Олимов Фируз', 'olimov.88@inbox.ru', NULL, '$2y$10$joW3dbSqEGhIfGla5fPkbOdr5EKwGP8M7M5yvk8AON8RggE7sxfk.', '2025-11-032025-04-04admin.png', '900000000', 'admin', 'active', '2I7axJIDdRZ39knHJq710XCAJes3XGqaNgHUNmGI1uGECabSbqdxmmezKvgm', '2023-03-07 07:09:39', '2025-12-04 11:53:42');

-- --------------------------------------------------------

--
-- Структура таблицы `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_tj` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `position` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `videos`
--

INSERT INTO `videos` (`id`, `video_url`, `caption`, `title_ru`, `title_tj`, `title_en`, `status`, `position`, `created_at`, `updated_at`) VALUES
(6, 'https://www.youtube.com/watch?v=vbjupoHdc2I&t=21s', 'upload/video/2025-12-22photo_2025-12-19_14-12-01.jpg', 'Торжественное открытие здания ГУП \"Центр цифровизации, инновации и повышения квалификации кадров сельского хозяйства\"', 'Ифтитоҳи расмии бинои КВД \"Маркази рақамикунонӣ, инноватсия ва такмили ихтисоси кадрҳои соҳаи кишоварзӣ\"', 'The grand opening of the building SUE \"Center for Digitalization, Innovation and Capacity building of Agricultural Employees\"', 1, 0, '2025-12-22 17:20:29', '2025-12-22 17:20:29');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_slug_unique` (`category_slug`),
  ADD KEY `categories_position_index` (`position`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_gallery_id_index` (`gallery_id`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jobs_slug_unique` (`slug`);

--
-- Индексы таблицы `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`);

--
-- Индексы таблицы `leaders`
--
ALTER TABLE `leaders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leaders_slug_unique` (`slug`);

--
-- Индексы таблицы `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `links_sort_index` (`sort`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_slug_unique` (`slug`),
  ADD KEY `news_category_id_foreign` (`category_id`),
  ADD KEY `news_user_id_foreign` (`user_id`),
  ADD KEY `news_publish_date_index` (`publish_date`),
  ADD KEY `news_status_index` (`status`),
  ADD KEY `news_top_slider_index` (`top_slider`);

--
-- Индексы таблицы `news_images`
--
ALTER TABLE `news_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_images_news_id_foreign` (`news_id`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_url_unique` (`url`);

--
-- Индексы таблицы `page_images`
--
ALTER TABLE `page_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_images_imageable_type_imageable_id_sort_order_index` (`imageable_type`,`imageable_id`,`sort_order`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `presidents`
--
ALTER TABLE `presidents`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `static_translations`
--
ALTER TABLE `static_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Индексы таблицы `sub_pages`
--
ALTER TABLE `sub_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_pages_page_id_sort_index` (`page_id`,`sort`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_position_index` (`position`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `leaders`
--
ALTER TABLE `leaders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `news_images`
--
ALTER TABLE `news_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `page_images`
--
ALTER TABLE `page_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `presidents`
--
ALTER TABLE `presidents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `static_translations`
--
ALTER TABLE `static_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблицы `sub_pages`
--
ALTER TABLE `sub_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `news_images`
--
ALTER TABLE `news_images`
  ADD CONSTRAINT `news_images_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sub_pages`
--
ALTER TABLE `sub_pages`
  ADD CONSTRAINT `sub_pages_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
