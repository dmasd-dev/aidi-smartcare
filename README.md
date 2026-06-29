# AiDi SmartCare

**AI-powered assisted health device with Sentia emotional AI companion**

## What is AiDi?

AiDi is a modular assisted health device that combines precision medication dispensing, proactive safety monitoring, and emotional AI companionship for elderly people living alone.

## Core Features

- **Modular tray system** — Interchangeable trays (S/M/L/XL): 7, 14, 28 days × 3-4 daily doses
- **Proactive safety network** — SOS button, fall detection camera, voice keyword recognition, hybrid Wi-Fi + LTE-M connectivity
- **Sentia AI companion** — Emotional AI powered by Gemini API, Google Cloud TTS (es-ES-Wavenet-C)
- **Smart escalation protocol** — User alert → family notification → video call → automatic voice call
- - **Proactive push notifications** — Daily emotional check-in via Web Push (VAPID), scheduled automatically at user-chosen time

## Technology Stack

- ESP32-WROOM-32, NEMA 17 motor, ESP32-CAM
- PHP, MQTT, MySQL
- Gemini API (Google)
- Google Cloud TTS
- LTE-M/NB-IoT (SIM7080G)

## Live Demo

- Dashboard: https://aidismartcare.com
- Sentia AI: https://neuroup.help/chat.html

## Build with Gemini XPRIZE Hackathon 2026

Submitted to the Build with Gemini XPRIZE — Category: Education & Human Potential ## Latest Updates — June 25, 2026

- Real-time timezone detection — Sentia adapts to any country automatically
- Time-of-day personalization — different tone for morning, afternoon and night
- Dynamic opening messages — never repeats the same greeting
- User name recognition from local memory
- Session summary optimized — response time reduced from 8s to 1.57s
- Gemini 2.5 Flash as main conversational engine (sentia_gemini.php)
- Emotional diary (diario emocional) — private, persistent, accessible from chat
