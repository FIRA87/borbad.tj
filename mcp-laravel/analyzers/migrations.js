import glob from "glob";
import fs from "fs";
import { LARAVEL_ROOT, MIGRATIONS_PATH } from "../config.js";

export async function analyzeMigrations() {
    const files = glob.sync(`${LARAVEL_ROOT}/${MIGRATIONS_PATH}/*.php`);
    const tables = [];
    for (const file of files) {
        const content = fs.readFileSync(file, "utf8");
        const tableMatch = content.match(/Schema::create\(['"](.*?)['"]/);
        if (tableMatch) tables.push({ table: tableMatch[1] });
    }
    return tables;
}
