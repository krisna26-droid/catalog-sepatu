# 📋 Sprint Planning: Catalog Sepatu Project

[cite_start]**Misi:** Menginternalisasi siklus Agile melalui simulasi Sprint end-to-end dengan standar industri[cite: 18].
[cite_start]**Durasi Sprint:** 1 Minggu[cite: 143, 153].
[cite_start]**Tim:** 2 Orang (Dev A & Dev B)[cite: 144].

---

## 🚀 Key Objectives
* [cite_start]Memahami konsep Sprint sederhana[cite: 39].
* [cite_start]Membagi pekerjaan ke tim secara adil[cite: 39].
* [cite_start]Menentukan prioritas eksekusi dengan disiplin Git[cite: 39].

---

## 🛠 Task Breakdown & Pembagian Kerja

[cite_start]Sesuai dengan "Aturan Emas", setiap fitur besar dipecah menjadi minimal 4-6 task kecil agar progress harian terlihat jelas[cite: 56].

### **Dev A (Frontend & Admin Management)**
| Task | Deskripsi | Estimasi Waktu |
| :--- | :--- | :--- |
| **Setup UI Admin** | [cite_start]Integrasi template Dashboard menggunakan Tailwind/Blade[cite: 44, 48]. | 2 Jam |
| **Migration Table** | [cite_start]Membuat skema database tabel `shoes` (name, brand, price, stock, image)[cite: 52]. | 1 Jam |
| **Create Shoe** | [cite_start]Implementasi logic dan form untuk menambah data sepatu baru[cite: 45]. | 2 Jam |
| **Read & List** | [cite_start]Menampilkan daftar sepatu dalam bentuk tabel di sisi Admin[cite: 45]. | 1.5 Jam |
| **Update & Delete** | Fitur untuk menyunting informasi dan menghapus data sepatu. | 2 Jam |
| **Upload Image** | Logic untuk menyimpan dan menampilkan foto produk sepatu. | 1 Jam |

### **Dev B (Authentication & User Catalog)**
| Task | Deskripsi | Estimasi Waktu |
| :--- | :--- | :--- |
| **Auth Setup** | [cite_start]Instalasi Laravel Breeze untuk fitur Login & Register[cite: 54]. | 1.5 Jam |
| **Role Middleware** | Membatasi akses antara Admin (CRUD) dan User (View Only). | 1 Jam |
| **User Catalog View** | Membuat tampilan grid katalog sepatu untuk pengunjung umum. | 2.5 Jam |
| **Product Detail** | Halaman detail untuk melihat spesifikasi lengkap tiap sepatu. | 1.5 Jam |
| **Search & Filter** | Fitur pencarian sepatu berdasarkan nama atau brand. | 2 Jam |
| **Review & Merge** | [cite_start]Melakukan cross-review PR dari Dev A sebelum penggabungan kode[cite: 95]. | 1 Jam |

---

## ⚠️ 3 Pilar Eksekusi (Aturan Wajib)
1. **Branching:** Wajib menggunakan *feature-branch* terpisah untuk setiap task. [cite_start]Dilarang langsung bekerja di branch `main`![cite: 61, 72].
2. [cite_start]**Commitment:** Commit harus kecil, rapi, dan memiliki pesan yang deskriptif[cite: 66].
3. [cite_start]**Syncing:** Lakukan push ke repository secara berkala dan buat Pull Request (PR) untuk setiap task yang selesai[cite: 70, 91].

---

## 📈 Output Target
* [cite_start]Link Repository GitHub/GitLab[cite: 149].
* [cite_start]Minimal 2-3 Pull Request (PR) per anggota tim[cite: 146].
* [cite_start]Screenshot proses Code Review dan diskusi di PR[cite: 151].
* [cite_start]Dokumen Ringkasan Retrospective (1 Halaman)[cite: 152].

---

## 🏁 Standar Kelulusan
* [cite_start]**Lulus (Siap Industri):** Skor $\ge 75$[cite: 176].
* [cite_start]**Perlu Penguatan:** Skor 60-74[cite: 175].
* [cite_start]**Wajib Ulang Sprint:** Skor < 60[cite: 173].