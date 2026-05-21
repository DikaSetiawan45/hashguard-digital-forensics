# HashGuard - Digital Evidence Integrity Verification System

HashGuard is a web-based digital forensic system designed to verify the integrity of digital evidence using MD5 and SHA-256 hashing algorithms.

---

## 🔐 Features

- Upload digital evidence
- MD5 hash generation
- SHA-256 hash generation
- Integrity verification
- Chain of Custody logging
- Audit trail system
- PDF report export
- Role-Based Access Control (RBAC)

---

## 🛠 Technologies Used

- Laravel 10
- PHP 8
- MySQL
- TailwindCSS
- Bootstrap
- DomPDF

---

## 📌 Research Background

This project was developed as a final thesis project in Information Systems focusing on:

- Digital Forensics
- Evidence Integrity
- Cyber Security
- Hash Verification

---

## ⚙️ System Workflow

1. Upload digital evidence
2. Generate MD5 & SHA-256 hash
3. Store baseline hash
4. Verify uploaded evidence
5. Compare hash values
6. Record verification logs

---

## 🧪 Integrity Verification

The system compares:

- Original MD5 hash
- Original SHA-256 hash

with the uploaded verification file.

If both hashes match:
- ✅ VALID

If hashes differ:
- ❌ MODIFIED

---

## 📊 Main Modules

- Authentication & RBAC
- Case Management
- Evidence Management
- Integrity Verification
- Audit Trail Logging
- PDF Reporting

---

## 👨‍💻 Author

Dika Setiawan  
Information Systems Student  
Digital Forensics Enthusiast

---

## 📄 License

MIT License
