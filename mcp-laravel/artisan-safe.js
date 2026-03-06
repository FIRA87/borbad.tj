import { Server } from "@modelcontextprotocol/sdk/server";
import { exec } from "child_process";

const allowed = [/^migrate/, /^make:/, /^route:list/];

const server = new Server({ name: "artisan-safe", version: "1.0.0" });

server.tool(
    "artisan",
    "Run safe artisan commands",
    { command: "string" },
    async ({ command }) => {
        if (!allowed.some(regex => regex.test(command))) return "Command not allowed";
        return new Promise((resolve) => {
            exec(`php artisan ${command}`, (err, stdout, stderr) => resolve(err ? stderr : stdout));
        });
    }
);

server.start();
