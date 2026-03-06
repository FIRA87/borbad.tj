import { Server } from "@modelcontextprotocol/sdk/server";
import { analyzeModels } from "./analyzers/models.js";
import { analyzeMigrations } from "./analyzers/migrations.js";
import { mapRelations } from "./analyzers/relations.js";
import { schemaDiff } from "./analyzers/schemaDiff.js";
import { exec } from "child_process";

const server = new Server({ name: "laravel-arch", version: "1.0.0" });

server.tool("analyze_models", "Analyze Laravel models", {}, async () => analyzeModels());
server.tool("analyze_migrations", "Analyze Laravel migrations", {}, async () => analyzeMigrations());
server.tool("map_relations", "Map Laravel relations", {}, async () => mapRelations());
server.tool("schema_diff", "Compare models vs migrations", {}, async () => schemaDiff());

server.start();
