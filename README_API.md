# Portal FMIPA - API Integration

## Ringkasan Perubahan

Saya telah menambahkan **REST API** yang lengkap untuk Portal FMIPA **tanpa mengubah** kode web yang sudah ada.

### File & Folder Baru yang Ditambahkan

#### 1. **API Controllers** (`app/Http/Controllers/Api/`)

Folder baru berisi 9 API controller terpisah dari web controllers:

- `AuthApiController.php` - Login dan autentikasi
- `UserApiController.php` - Manajemen user (Dosen, Mahasiswa, Admin, Tendik)
- `KelasApiController.php` - Manajemen kelas/class
- `TugasApiController.php` - Manajemen tugas/assignment
- `DokumenApiController.php` - Manajemen dokumen
- `DosenProfileApiController.php` - Profil dosen
- `MahasiswaProfileApiController.php` - Profil mahasiswa
- `JawabanApiController.php` - Submit dan penilaian jawaban
- `LinkApiController.php` - Manajemen link

#### 2. **API Resources** (`app/Http/Resources/`)

Folder baru berisi response formatting:

- `UserResource.php`
- `KelasResource.php`
- `TugasResource.php`
- `DokumenResource.php`
- `DosenProfileResource.php`
- `MahasiswaProfileResource.php`
- `JawabanResource.php`
- `LinkResource.php`

#### 3. **Updated Files**

- `routes/api.php` - Updated dengan semua API routes

#### 4. **Documentation Files**

- `API_DOCUMENTATION.md` - Dokumentasi lengkap API (Bahasa Indonesia)
- `Portal-FMIPA-API.postman_collection.json` - Postman Collection (siap import)

---

## Fitur API

### ✅ Authentication (Token-based)

- Login dengan email & password → mendapatkan API token
- Logout & revoke token
- Get current user profile

### ✅ 9 Resource Total (53 Endpoints)

1. **Users** - 7 endpoints (CRUD + filter by level)
2. **Kelas** - 6 endpoints (CRUD + get by user)
3. **Tugas** - 6 endpoints (CRUD + get by kelas)
4. **Dokumen** - 6 endpoints (CRUD + get by user, file upload)
5. **Dosen Profile** - 6 endpoints (CRUD + get by user)
6. **Mahasiswa Profile** - 6 endpoints (CRUD + get by user)
7. **Jawaban** - 7 endpoints (CRUD + get by tugas/user)
8. **Links** - 5 endpoints (CRUD)

### ✅ Consistent Response Format

```json
{
  "status": "success|error",
  "data": {...},
  "message": "..."
}
```

### ✅ Proper Error Handling

- 404 Not Found
- 401 Unauthorized
- 422 Validation errors
- 200/201 Success responses

---

## Quick Start

### 1. Login untuk Mendapatkan Token

```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "dosen@example.com",
    "password": "password"
  }'
```

Response:

```json
{
  "status": "success",
  "data": {
    "user": {...},
    "token": "1|abc123..."
  }
}
```

### 2. Gunakan Token untuk Request

```bash
curl -X GET http://localhost:8000/api/kelas \
  -H "Authorization: Bearer 1|abc123..."
```

### 3. Buka Dokumentasi Lengkap

- **Markdown Docs**: Buka `API_DOCUMENTATION.md`
- **Postman Collection**: Import `Portal-FMIPA-API.postman_collection.json`

---

## Setup Postman

1. **Download Postman** (jika belum): https://www.postman.com/downloads/
2. **Import Collection**:
    - Buka Postman → Click "Import"
    - Pilih file `Portal-FMIPA-API.postman_collection.json`
3. **Setup Environment Variables**:
    - `base_url`: `localhost:8000`
    - `api_token`: (auto-filled setelah login)
4. **Test**: Klik endpoint apapun dan send

---

## Struktur Direktori

```
app/Http/Controllers/
├── Api/  (BARU)
│   ├── AuthApiController.php
│   ├── UserApiController.php
│   ├── KelasApiController.php
│   ├── TugasApiController.php
│   ├── DokumenApiController.php
│   ├── DosenProfileApiController.php
│   ├── MahasiswaProfileApiController.php
│   ├── JawabanApiController.php
│   └── LinkApiController.php
├── [Existing Web Controllers - TIDAK BERUBAH]

app/Http/Resources/  (BARU)
├── UserResource.php
├── KelasResource.php
├── TugasResource.php
├── DokumenResource.php
├── DosenProfileResource.php
├── MahasiswaProfileResource.php
├── JawabanResource.php
└── LinkResource.php

routes/
├── api.php  (UPDATED)
└── web.php  (TIDAK BERUBAH)
```

---

## Endpoint Categories

### 🔓 PUBLIC (Tidak perlu token)

- `POST /api/login` - Login

### 🔒 PROTECTED (Butuh token)

- Semua endpoint lain memerlukan `Authorization: Bearer {token}`

---

## Response Examples

### Success (200/201)

```json
{
    "status": "success",
    "data": {
        "id": 1,
        "name": "Ahmad Dosen",
        "email": "ahmad@example.com",
        "level": "Dosen"
    },
    "message": "User retrieved successfully"
}
```

### Not Found (404)

```json
{
    "status": "error",
    "message": "User not found"
}
```

### Validation Error (422)

```json
{
    "status": "error",
    "message": "The given data was invalid",
    "errors": {
        "email": ["The email field is required"]
    }
}
```

---

## File Upload Endpoints

Untuk upload dokumen atau jawaban dengan file, gunakan `multipart/form-data`:

```bash
curl -X POST http://localhost:8000/api/dokumen \
  -H "Authorization: Bearer TOKEN" \
  -F "nama_dokumen=My Document" \
  -F "file_path=@/path/to/file.pdf"
```

---

## Validation Rules Ringkas

| Resource | Required Fields                                  |
| -------- | ------------------------------------------------ |
| User     | name, email, password, level                     |
| Kelas    | kode_kelas (unique), nama_kelas                  |
| Tugas    | kelas_id, judul, deskripsi, tgl_mulai, tgl_akhir |
| Dokumen  | nama_dokumen, file_path (file)                   |
| Jawaban  | tugas_id, (jawaban OR file_jawaban)              |

---

## Penting: Web App Tidak Berubah ✅

- Semua **web controllers** tetap original → Aplikasi web berjalan normal
- Semua **routes web** tetap original → Fitur web tidak terpengaruh
- API adalah **layer terpisah** → Bisa digunakan oleh mobile app, web app lain, etc

---

## Testing API

### Dengan cURL

Lihat contoh di `API_DOCUMENTATION.md`

### Dengan Postman

Import collection dan jalankan requests

### Dengan Laravel Tinker

```bash
php artisan tinker

$user = \App\Models\User::first();
$token = $user->createToken('test-token')->plainTextToken;
echo $token;
```

---

## Endpoint URL Patterns

Semua endpoint mengikuti RESTful conventions:

```
GET    /api/{resource}              - List all
POST   /api/{resource}              - Create new
GET    /api/{resource}/{id}         - Get single
PUT    /api/{resource}/{id}         - Update
DELETE /api/{resource}/{id}         - Delete
GET    /api/{resource}/{relation}/{id} - Get by relation
```

---

## Troubleshooting

### 401 Unauthorized

- Pastikan token ada dan valid
- Format: `Authorization: Bearer <token>`
- Logout dan login ulang untuk token baru

### 422 Validation Error

- Periksa field yang required di documentation
- Pastikan format data sesuai (date format, etc)

### 404 Not Found

- Pastikan ID resource ada
- Double-check endpoint URL

---

## Next Steps (Optional)

Jika diperlukan, bisa tambahkan:

- Rate limiting
- Token expiration
- Role-based authorization middleware
- API logging
- Caching
- Pagination untuk large datasets

---

## Dokumentasi Lengkap

- **Complete API Docs**: `API_DOCUMENTATION.md`
- **Postman Collection**: `Portal-FMIPA-API.postman_collection.json`
- **API Routes**: `routes/api.php`

---

**API Version**: 1.0.0  
**Date**: February 18, 2026  
**Status**: ✅ Ready to Use
