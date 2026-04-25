-- ========================================
-- SCRIPT CEK DAN PERBAIKI ADMIN GROUP
-- ========================================

-- 1. CEK APAKAH GROUP 'admin' ADA
SELECT * FROM auth_groups WHERE name = 'admin';

-- Jika tidak ada, buat group admin:
-- INSERT INTO auth_groups (name, description) VALUES ('admin', 'Administrator');

-- 2. CEK USER YANG LOGIN (ganti email sesuai akun admin Anda)
SELECT id, email, username, nama, active FROM users WHERE email = 'GANTI_DENGAN_EMAIL_ADMIN';

-- 3. CEK APAKAH USER SUDAH MASUK GROUP ADMIN
-- Ganti 'GANTI_DENGAN_EMAIL_ADMIN' dengan email admin Anda
SELECT 
    u.id as user_id,
    u.email,
    u.username,
    u.nama,
    g.id as group_id,
    g.name as group_name
FROM users u
LEFT JOIN auth_groups_users gu ON u.id = gu.user_id
LEFT JOIN auth_groups g ON gu.group_id = g.id
WHERE u.email = 'GANTI_DENGAN_EMAIL_ADMIN';

-- 4. JIKA USER BELUM MASUK GROUP ADMIN, TAMBAHKAN:
-- Cara 1: Jika Anda tahu user_id dan group_id
-- INSERT INTO auth_groups_users (group_id, user_id) 
-- VALUES (
--     (SELECT id FROM auth_groups WHERE name = 'admin'),
--     (SELECT id FROM users WHERE email = 'GANTI_DENGAN_EMAIL_ADMIN')
-- );

-- Cara 2: Jika sudah tahu ID-nya langsung
-- INSERT INTO auth_groups_users (group_id, user_id) VALUES (1, 1);

-- 5. VERIFIKASI LAGI SETELAH INSERT
SELECT 
    u.id as user_id,
    u.email,
    u.username,
    u.nama,
    g.id as group_id,
    g.name as group_name
FROM users u
LEFT JOIN auth_groups_users gu ON u.id = gu.user_id
LEFT JOIN auth_groups g ON gu.group_id = g.id
WHERE u.email = 'GANTI_DENGAN_EMAIL_ADMIN';

