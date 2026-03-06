import { analyzeModels } from "./models.js";
import { analyzeMigrations } from "./migrations.js";

export async function schemaDiff() {
    const models = await analyzeModels();
    const tables = await analyzeMigrations();
    const tableNames = tables.map(t => t.table);
    return models.map(m => ({ model: m.model, tableExists: tableNames.includes(m.table) }));
}
