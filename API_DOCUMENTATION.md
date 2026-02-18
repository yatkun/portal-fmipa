# Portal FMIPA API Documentation

## Daftar Isi
- [Setup](#setup)
- [Authentication](#authentication)
- [API Endpoints](#api-endpoints)
- [Response Format](#response-format)
- [Postman Collection](#postman-collection)
- [Contoh Penggunaan](#contoh-penggunaan)

## Setup

### Requirements
- Laravel 10.x
- PHP 8.1+
- Sanctum (sudah installed)

### Installation

API sudah terintegrasi dalam projekt. Untuk mulai menggunakan API:

1. **Jalankan migrations** (jika belum):
   ```bash
   php artisan migrate
   ```

2. **Pastikan database seeders berjalan**:
   ```bash
   php artisan migrate:fresh --seed
   ```

3. **Server development**:
   ```bash
   php artisan serve
   ```

API akan tersedia di: `http://localhost:8000/api`

---

## Authentication

### API Token Authentication

Semua endpoint (kecuali `/api/login`) memerlukan **API Token** untuk autentikasi.

#### Mendapatkan Token

**Request:**
```
POST /api/login
Content-Type: application/json

{
  "nidn": "197001011995031001",
  "password": "password"
}
```

**Response:**
```json
{
  "status": "success",
  "data": {
    "user": {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "level": "Dosen"
    },
    "token": "1|abc123xyz789..."
  },
  "message": "Login successful"
}
```

#### Menggunakan Token

Masukkan token di header `Authorization`:

```
Authorization: Bearer 1|abc123xyz789...
```

Atau di header `X-SANCTUM-CSRF-TOKEN` jika diperlukan.

#### Logout

**Request:**
```
POST /api/logout
Authorization: Bearer YOUR_TOKEN
```

---

## API Endpoints

### Authentication Endpoints

| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| POST | `/api/login` | Login dan generate token |
| POST | `/api/logout` | Logout dan revoke token |
| GET | `/api/profile` | Get profile user yang login |

### Users
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/users` | Get semua user |
| GET | `/api/users/{id}` | Get user by ID |
| POST | `/api/users` | Create user baru |
| PUT | `/api/users/{id}` | Update user |
| DELETE | `/api/users/{id}` | Delete user |
| GET | `/api/users/dosen` | Get semua Dosen |
| GET | `/api/users/mahasiswa` | Get semua Mahasiswa aktif |

### User Levels & Fields

**User Levels:** `Dosen`, `Mahasiswa`, `Admin`, `Tendik`

**Login Field:** `nidn` (bukan email)

### Kelas (Classes)
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/kelas` | Get semua kelas |
| GET | `/api/kelas/{id}` | Get kelas by ID |
| POST | `/api/kelas` | Create kelas baru |
| PUT | `/api/kelas/{id}` | Update kelas |
| DELETE | `/api/kelas/{id}` | Delete kelas |
| GET | `/api/kelas/user/{userId}` | Get kelas by user |

### Tugas (Assignments)
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/tugas` | Get semua tugas |
| GET | `/api/tugas/{id}` | Get tugas by ID |
| POST | `/api/tugas` | Create tugas baru |
| PUT | `/api/tugas/{id}` | Update tugas |
| DELETE | `/api/tugas/{id}` | Delete tugas |
| GET | `/api/tugas/kelas/{kelasId}` | Get tugas by kelas |

### Dokumen (Documents)
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/dokumen` | Get semua dokumen |
| GET | `/api/dokumen/{id}` | Get dokumen by ID |
| POST | `/api/dokumen` | Upload dokumen baru |
| PUT | `/api/dokumen/{id}` | Update dokumen |
| DELETE | `/api/dokumen/{id}` | Delete dokumen |
| GET | `/api/dokumen/user/{userId}` | Get dokumen by user |

### Dosen Profile
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/dosen-profile` | Get semua dosen profile |
| GET | `/api/dosen-profile/{id}` | Get dosen profile by ID |
| POST | `/api/dosen-profile` | Create dosen profile |
| PUT | `/api/dosen-profile/{id}` | Update dosen profile |
| DELETE | `/api/dosen-profile/{id}` | Delete dosen profile |
| GET | `/api/dosen-profile/user/{userId}` | Get dosen profile by user |

### Mahasiswa Profile
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/mahasiswa-profile` | Get semua mahasiswa profile |
| GET | `/api/mahasiswa-profile/{id}` | Get mahasiswa profile by ID |
| POST | `/api/mahasiswa-profile` | Create mahasiswa profile |
| PUT | `/api/mahasiswa-profile/{id}` | Update mahasiswa profile |
| DELETE | `/api/mahasiswa-profile/{id}` | Delete mahasiswa profile |
| GET | `/api/mahasiswa-profile/user/{userId}` | Get mahasiswa profile by user |

### Jawaban (Answers)
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/jawaban` | Get semua jawaban |
| GET | `/api/jawaban/{id}` | Get jawaban by ID |
| POST | `/api/jawaban` | Submit jawaban baru |
| PUT | `/api/jawaban/{id}` | Update jawaban (grade) |
| DELETE | `/api/jawaban/{id}` | Delete jawaban |
| GET | `/api/jawaban/tugas/{tugasId}` | Get jawaban by tugas |
| GET | `/api/jawaban/user/{userId}` | Get jawaban by user |

### Links
| Method | Endpoint | Deskripsi |
|--------|----------|-----------|
| GET | `/api/links` | Get semua links |
| GET | `/api/links/{id}` | Get link by ID |
| POST | `/api/links` | Create link baru |
| PUT | `/api/links/{id}` | Update link |
| DELETE | `/api/links/{id}` | Delete link |

---

## Response Format

### Success Response
```json
{
  "status": "success",
  "data": {...},
  "message": "Operation successful"
}
```

### Error Response
```json
{
  "status": "error",
  "message": "Error description"
}
```

### Status Codes
- `200`: OK - Request berhasil
- `201`: Created - Resource berhasil dibuat
- `400`: Bad Request - Request tidak valid
- `401`: Unauthorized - Token tidak valid/tidak ada
- `403`: Forbidden - Akses ditolak
- `404`: Not Found - Resource tidak ditemukan
- `422`: Unprocessable Entity - Validation error
- `500`: Server Error

---

## Postman Collection

Dokumentasi lengkap tersedia dalam format Postman Collection.

### Import Collection

1. Buka Postman
2. Klik "Import" → pilih file `Portal-FMIPA-API.postman_collection.json`
3. Atau drag & drop file ke Postman

### Setup Environment Variables

Dalam Postman, set variables di Environment:
- `base_url`: `localhost:8000` (atau URL server Anda)
- `api_token`: (akan otomatis diisi setelah login)

Atau di setup auth dengan type "Bearer Token"

### Workflow
1. Jalankan endpoint `/login` dengan nidn + password
2. Dapatkan token dari response
3. Token akan otomatis disimpan di variable `api_token` (jika setup dengan test script)
4. Gunakan endpoint lain dengan token yang sudah ada

---

## Contoh Penggunaan

### 1. Login

```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{
    "nidn": "197001011995031001",
    "password": "password"
  }'
```

Response:
```json
{
  "status": "success",
  "data": {
    "user": {
      "id": 1,
      "name": "Ahmad Dosen",
      "nidn": "197001011995031001",
      "level": "Dosen"
    },
    "token": "1|abc123xyz789..."
  },
  "message": "Login successful"
}
```

### 2. Get Semua Kelas

```bash
curl -X GET http://localhost:8000/api/kelas \
  -H "Authorization: Bearer 1|abc123xyz789..."
```

### 3. Create Kelas Baru

```bash
curl -X POST http://localhost:8000/api/kelas \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer 1|abc123xyz789..." \
  -d '{
    "kode_kelas": "MATH101",
    "nama_kelas": "Calculus I"
  }'
```

### 4. Create Tugas

```bash
curl -X POST http://localhost:8000/api/tugas \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer 1|abc123xyz789..." \
  -d '{
    "kelas_id": 1,
    "judul": "Assignment 1",
    "deskripsi": "Complete problems from chapter 3",
    "tgl_mulai": "2024-02-18",
    "tgl_akhir": "2024-02-25"
  }'
```

### 5. Submit Jawaban

```bash
curl -X POST http://localhost:8000/api/jawaban \
  -H "Authorization: Bearer 1|abc123xyz789..." \
  -F "tugas_id=1" \
  -F "jawaban=My answer text" \
  -F "file_jawaban=@/path/to/answer.pdf"
```

### 6. Update Grade Jawaban

```bash
curl -X PUT http://localhost:8000/api/jawaban/1 \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer 1|abc123xyz789..." \
  -d '{
    "nilai": 85
  }'
```

### 7. Upload Dokumen

```bash
curl -X POST http://localhost:8000/api/dokumen \
  -H "Authorization: Bearer 1|abc123xyz789..." \
  -F "nama_dokumen=Research Paper" \
  -F "file_path=@/path/to/document.pdf"
```

### 8. Logout

```bash
curl -X POST http://localhost:8000/api/logout \
  -H "Authorization: Bearer 1|abc123xyz789..."
```

---

## Validation Rules

### Create User
```
name: required|string|max:255
nidn: required|string|max:255|unique:users
password: required|string|min:6
level: required|in:Dosen,Mahasiswa,Admin,Tendik
```

### Create Kelas
```
kode_kelas: required|string|max:255|unique:kelas
nama_kelas: required|string|max:255
```

### Create Tugas
```
kelas_id: required|exists:kelas,id
judul: required|string|max:255
deskripsi: required|string
tgl_mulai: required|date
tgl_akhir: required|date|after:tgl_mulai
```

### Upload Dokumen
```
nama_dokumen: required|string|max:255
file_path: required|file
```

---

## Error Handling

Semua error response mengikuti format:

```json
{
  "status": "error",
  "message": "Error description",
  "errors": {
    "field_name": ["Error message"]
  }
}
```

Contoh validation error:

```json
{
  "status": "error",
  "message": "The given data was invalid",
  "errors": {
    "email": ["The email has already been taken"],
    "kode_kelas": ["Kode kelas telah digunakan"]
  }
}
```

---

## Rate Limiting

Tidak ada rate limiting yang diaplikasikan saat ini. Jika diperlukan, dapat dikonfigurasi di middleware.

---

## Security Notes

1. **HTTPS**: Pastikan menggunakan HTTPS di production
2. **Token Security**: Jangan shared token dengan orang lain
3. **Renewal**: Token tidak ada expiry dalam setup saat ini, tapi dapat diatur
4. **CORS**: Jika frontend di domain berbeda, setup CORS di `config/cors.php`

---

## Support

Jika ada pertanyaan atau issue, silakan hubungi tim development.

---

**API Version:** 1.0.0  
**Last Updated:** February 18, 2026
