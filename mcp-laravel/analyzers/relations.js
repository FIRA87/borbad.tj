import { analyzeModels } from "./models.js";

export async function mapRelations() {
    const models = await analyzeModels();
    return models.map(m => ({ model: m.model, relations: "AST-based parser (belongsTo, hasMany, morph*)" }));
}
