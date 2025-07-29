# Setup Google OAuth untuk Laravel

## Langkah 1: Buat Project di Google Cloud Console

1. Buka [Google Cloud Console](https://console.cloud.google.com/)
2. Klik "Select a project" → "New Project"
3. Beri nama project: "Breast Cancer Detection"
4. Klik "Create"

## Langkah 2: Enable Google APIs

1. Di dashboard project, cari "APIs & Services" → "Library"
2. Cari dan enable:
    - **Google+ API** (deprecated tapi masih diperlukan untuk Socialite)
    - **Google People API** (alternatif modern)

## Langkah 3: Buat OAuth 2.0 Credentials

1. Pergi ke "APIs & Services" → "Credentials"
2. Klik "+ CREATE CREDENTIALS" → "OAuth client ID"
3. Pilih "Web application"
4. Isi konfigurasi:
    - **Name**: Breast Cancer Web App
    - **Authorized JavaScript origins**:
        - `http://127.0.0.1:8000`
        - `http://localhost:8000`
    - **Authorized redirect URIs**:
        - `http://127.0.0.1:8000/auth/google/callback`
        - `http://localhost:8000/auth/google/callback`

## Langkah 4: Copy Credentials ke .env

Setelah credentials dibuat, copy:

-   **Client ID** → `GOOGLE_CLIENT_ID`
-   **Client Secret** → `GOOGLE_CLIENT_SECRET`

## Langkah 5: Update .env

```env
GOOGLE_CLIENT_ID=your-actual-client-id-here
GOOGLE_CLIENT_SECRET=your-actual-client-secret-here
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback
```

## Catatan Penting

-   Jangan commit credentials ke Git
-   Gunakan credentials berbeda untuk production
-   Untuk production, ganti URL dengan domain asli

## Testing

Setelah setup selesai, test dengan:

1. Buka `http://127.0.0.1:8000/login`
2. Klik "Continue with Google"
3. Seharusnya redirect ke Google OAuth
