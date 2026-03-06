import glob from "glob";
import fs from "fs";
import path from "path";
import { LARAVEL_ROOT, MODELS_PATH } from "../config.js";

export async function analyzeModels() {
    const files = glob.sync(`${LARAVEL_ROOT}/${MODELS_PATH}/**/*.php`);
    const models = [];
    for (const file of files) {
        const content = fs.readFileSync(file, "utf8");
        const modelName = path.basename(file, ".php");
        const tableMatch = content.match(/protected \$table = ['"](.*?)['"]/);
        const fillableMatch = content.match(/protected \$fillable = \[(.*?)\]/s);
        const softDeletes = content.includes("SoftDeletes");
        models.push({ model: modelName, table: tableMatch?.[1] || null, fillable: fillableMatch?.[1] || [], softDeletes });
    }
    return models;
}
