-- Adminer 4.6.3 PostgreSQL dump

DROP TABLE IF EXISTS "cbt_admin";
DROP SEQUENCE IF EXISTS "cbt_admin_Urut_seq";
CREATE SEQUENCE "cbt_admin_Urut_seq" INCREMENT  MINVALUE  MAXVALUE  START  CACHE ;

CREATE TABLE "public"."cbt_admin" (
    "Urut" integer DEFAULT nextval('"cbt_admin_Urut_seq"') NOT NULL,
    "XSekolah" character varying(250) NOT NULL,
    "XTingkat" character varying(15) NOT NULL,
    "XIp" character varying(15) NOT NULL,
    "XAlamat" text NOT NULL,
    "XKec" character varying(50) NOT NULL,
    "XKab" character varying(50) NOT NULL,
    "XProp" character varying(50) NOT NULL,
    "XTelp" character varying(20) NOT NULL,
    "XFax" character varying(20) NOT NULL,
    "XEmail" character varying(250) NOT NULL,
    "XLogo" character varying(100) NOT NULL,
    "XBanner" character varying(250) NOT NULL,
    "XKepSek" character varying(100) NOT NULL,
    "XWarna" character varying(10) NOT NULL,
    "XStatus" character varying(1) NOT NULL,
    "XKodeSekolah" character varying(50) NOT NULL,
    "XNIPKepsek" character varying(30) NOT NULL,
    "XLogin" character varying(50) NOT NULL,
    "xinstall" character varying(200) NOT NULL,
    "XPengumuman" text NOT NULL,
    "XTimeZone" character varying(20),
    CONSTRAINT "cbt_admin_pkey" PRIMARY KEY ("Urut")
) WITH (oids = false);

TRUNCATE "cbt_admin";
INSERT INTO "cbt_admin" ("Urut", "XSekolah", "XTingkat", "XIp", "XAlamat", "XKec", "XKab", "XProp", "XTelp", "XFax", "XEmail", "XLogo", "XBanner", "XKepSek", "XWarna", "XStatus", "XKodeSekolah", "XNIPKepsek", "XLogin", "xinstall", "XPengumuman", "XTimeZone") VALUES
(1,	'SMK Ma''arif NU 1 Ajibarang',	'SMK/SMA/MA',	'127.0.0.1',	'Jl. Raya Ajibarang KM 1',	'Ajibarang',	'Banyumas',	'Jawa Tengah',	'083873272419',	'083873272419',	'manusa@manusa.sch.id',	'logo_lp_maarif_svg2.png',	'banner.png',	'Asdasdasdas',	'#F7F107',	'1',	'SMK98678698789',	'Zaenudin, S.Pd.,M.Si',	'bg-2.png',	'',	'',	'Asia/Jakarta');

DROP TABLE IF EXISTS "cbt_config";
DROP SEQUENCE IF EXISTS "cbt_config_Urut_seq";
CREATE SEQUENCE "cbt_config_Urut_seq" INCREMENT  MINVALUE  MAXVALUE  START  CACHE ;

CREATE TABLE "public"."cbt_config" (
    "Urut" integer DEFAULT nextval('"cbt_config_Urut_seq"') NOT NULL,
    "XNilai" integer DEFAULT '0' NOT NULL,
    "XElearning" integer DEFAULT '0' NOT NULL,
    "XCbt" integer DEFAULT '0' NOT NULL,
    "XGuru2Admin" smallint DEFAULT '0' NOT NULL,
    CONSTRAINT "cbt_config_pkey" PRIMARY KEY ("Urut")
) WITH (oids = false);

TRUNCATE "cbt_config";
INSERT INTO "cbt_config" ("Urut", "XNilai", "XElearning", "XCbt", "XGuru2Admin") VALUES
(1,	1,	'0',	1,	1);

DROP TABLE IF EXISTS "cbt_jawaban";
DROP SEQUENCE IF EXISTS "cbt_jawaban_Urutan_seq";
CREATE SEQUENCE "cbt_jawaban_Urutan_seq" INCREMENT  MINVALUE  MAXVALUE  START  CACHE ;

CREATE TABLE "public"."cbt_jawaban" (
    "Urutan" integer DEFAULT nextval('"cbt_jawaban_Urutan_seq"') NOT NULL,
    "Urut" integer NOT NULL,
    "XNomerSoal" integer NOT NULL,
    "XIdUjian" integer NOT NULL,
    "XNomerUjian" character varying(20) NOT NULL,
    "XTokenUjian" character varying(5) NOT NULL,
    "XA" integer NOT NULL,
    "XB" integer NOT NULL,
    "XC" integer NOT NULL,
    "XD" integer NOT NULL,
    "XE" integer NOT NULL,
    "XJawaban" character varying(1),
    "XTemp" character varying(1),
    "XJawabanEsai" character varying(1),
    "XKodeJawab" character varying(2),
    "XNilaiJawab" character varying(1),
    "XNilai" integer,
    "XNilaiEsai" double precision,
    "XRagu" character varying(11),
    "XMulai" double precision,
    "XPutar" integer,
    "XMulaiV" double precision,
    "XPutarV" integer,
    "XTglJawab" date,
    "XJamJawab" time without time zone,
    "XKunciJawaban" character varying(1),
    "Campur" character varying(20),
    "XUserPeriksa" character varying(15),
    "XTglPeriksa" character varying(10),
    "XJamPeriksa" character varying(8),
    CONSTRAINT "cbt_jawaban_pkey" PRIMARY KEY ("Urutan"),
    CONSTRAINT "cbt_jawaban_XIdUjian_fkey" FOREIGN KEY ("XIdUjian") REFERENCES cbt_ujian("Urut") ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE,
    CONSTRAINT "cbt_jawaban_XNomerUjian_fkey" FOREIGN KEY ("XNomerUjian") REFERENCES cbt_siswa("XNomerUjian") ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE
) WITH (oids = false);

CREATE INDEX "cbt_jawaban_XIdUjian" ON "public"."cbt_jawaban" USING btree ("XIdUjian");

CREATE INDEX "cbt_jawaban_XNomerSoal" ON "public"."cbt_jawaban" USING btree ("XNomerSoal");

CREATE INDEX "cbt_jawaban_XNomerUjian" ON "public"."cbt_jawaban" USING btree ("XNomerUjian");

CREATE INDEX "cbt_jawaban_XTokenUjian" ON "public"."cbt_jawaban" USING btree ("XTokenUjian");


DROP TABLE IF EXISTS "cbt_kelas";
DROP SEQUENCE IF EXISTS "cbt_kelas_Urut_seq";
CREATE SEQUENCE "cbt_kelas_Urut_seq" INCREMENT  MINVALUE  MAXVALUE  START  CACHE ;

CREATE TABLE "public"."cbt_kelas" (
    "Urut" integer DEFAULT nextval('"cbt_kelas_Urut_seq"') NOT NULL,
    "XNamaKelas" character varying(20) NOT NULL,
    "XKodeJurusan" character varying(20) NOT NULL,
    "XKodeKelas" character varying(10) NOT NULL,
    "XStatusKelas" character varying(1) NOT NULL,
    CONSTRAINT "cbt_kelas_XNamaKelas_key" UNIQUE ("XNamaKelas"),
    CONSTRAINT "cbt_kelas_pkey" PRIMARY KEY ("Urut")
) WITH (oids = false);

CREATE INDEX "cbt_kelas_XKodeJurusan" ON "public"."cbt_kelas" USING btree ("XKodeJurusan");

CREATE INDEX "cbt_kelas_XKodeKelas" ON "public"."cbt_kelas" USING btree ("XKodeKelas");


DROP TABLE IF EXISTS "cbt_mapel";
DROP SEQUENCE IF EXISTS "cbt_mapel_Urut_seq";
CREATE SEQUENCE "cbt_mapel_Urut_seq" INCREMENT  MINVALUE  MAXVALUE  START  CACHE ;

CREATE TABLE "public"."cbt_mapel" (
    "Urut" integer DEFAULT nextval('"cbt_mapel_Urut_seq"') NOT NULL,
    "XKodeMapel" character varying(10) NOT NULL,
    "XNamaMapel" character varying(30) NOT NULL,
    "XKKM" double precision NOT NULL,
    "XMapelAgama" character(1) DEFAULT 'N' NOT NULL,
    CONSTRAINT "cbt_mapel_XKodeMapel" UNIQUE ("XKodeMapel"),
    CONSTRAINT "cbt_mapel_pkey" PRIMARY KEY ("Urut")
) WITH (oids = false);


DROP TABLE IF EXISTS "cbt_nilai";
DROP SEQUENCE IF EXISTS "cbt_nilai_Urut_seq";
CREATE SEQUENCE "cbt_nilai_Urut_seq" INCREMENT  MINVALUE  MAXVALUE  START  CACHE ;

CREATE TABLE "public"."cbt_nilai" (
    "Urut" integer DEFAULT nextval('"cbt_nilai_Urut_seq"') NOT NULL,
    "XNomerUjian" character varying(20) NOT NULL,
    "XIdUjian" integer NOT NULL,
    "XTokenUjian" character varying(5) NOT NULL,
    "XTgl" date NOT NULL,
    "XJumSoal" integer NOT NULL,
    "XBenar" integer NOT NULL,
    "XSalah" integer NOT NULL,
    "XNilai" integer NOT NULL,
    "XPersenPil" double precision NOT NULL,
    "XPersenEsai" double precision,
    "XEsai" double precision,
    "XTotalNilai" double precision NOT NULL,
    "XPilGanda" integer NOT NULL,
    "XStatus" character(255) NOT NULL,
    CONSTRAINT "cbt_nilai_pkey" PRIMARY KEY ("Urut"),
    CONSTRAINT "cbt_nilai_XNomerUjian_fkey" FOREIGN KEY ("XNomerUjian") REFERENCES cbt_siswa("XNomerUjian") ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE
) WITH (oids = false);


DROP TABLE IF EXISTS "cbt_paketsoal";
DROP SEQUENCE IF EXISTS "cbt_paketsoal_Urut_seq";
CREATE SEQUENCE "cbt_paketsoal_Urut_seq" INCREMENT  MINVALUE  MAXVALUE  START  CACHE ;

CREATE TABLE "public"."cbt_paketsoal" (
    "Urut" integer DEFAULT nextval('"cbt_paketsoal_Urut_seq"') NOT NULL,
    "XKodeKelas" character varying(10) NOT NULL,
    "XKodeJurusan" character varying(10),
    "XKodeMapel" character varying(10) NOT NULL,
    "XPilGanda" integer NOT NULL,
    "XEsai" integer,
    "XPersenPil" integer NOT NULL,
    "XPersenEsai" integer,
    "XKodeSoal" character varying(50) NOT NULL,
    "XJumPilihan" integer DEFAULT '5' NOT NULL,
    "XJumSoal" integer,
    "JumUjian" integer,
    "XAcakSoal" character(1) DEFAULT 'Y' NOT NULL,
    "XGuru" character varying(30) NOT NULL,
    "XSetId" character varying(10) NOT NULL,
    "XStatusSoal" character varying(1) DEFAULT 'N' NOT NULL,
    "XTglBuat" date NOT NULL,
    "XPaketSoal" text,
    "XSemua" character varying(10) DEFAULT 'T' NOT NULL,
    CONSTRAINT "cbt_paketsoal_XKodeSoal_key" UNIQUE ("XKodeSoal"),
    CONSTRAINT "cbt_paketsoal_pkey" PRIMARY KEY ("Urut"),
    CONSTRAINT "cbt_paketsoal_XGuru_fkey" FOREIGN KEY ("XGuru") REFERENCES cbt_user("Username") ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE,
    CONSTRAINT "cbt_paketsoal_XKodeMapel_fkey" FOREIGN KEY ("XKodeMapel") REFERENCES cbt_mapel("XKodeMapel") ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE
) WITH (oids = false);

CREATE INDEX "cbt_paketsoal_Urut" ON "public"."cbt_paketsoal" USING btree ("Urut");

CREATE INDEX "cbt_paketsoal_XGuru" ON "public"."cbt_paketsoal" USING btree ("XGuru");


DROP TABLE IF EXISTS "cbt_pesan";
DROP SEQUENCE IF EXISTS "cbt_pesan_Urut_seq";
CREATE SEQUENCE "cbt_pesan_Urut_seq" INCREMENT  MINVALUE  MAXVALUE  START  CACHE ;

CREATE TABLE "public"."cbt_pesan" (
    "Urut" integer DEFAULT nextval('"cbt_pesan_Urut_seq"') NOT NULL,
    "XGuru" character varying(20) NOT NULL,
    "XPesan" text NOT NULL,
    "XTgl" timestamp NOT NULL,
    CONSTRAINT "cbt_pesan_pkey" PRIMARY KEY ("Urut")
) WITH (oids = false);

CREATE INDEX "cbt_pesan_XGuru" ON "public"."cbt_pesan" USING btree ("XGuru");

TRUNCATE "cbt_pesan";
INSERT INTO "cbt_pesan" ("Urut", "XGuru", "XPesan", "XTgl") VALUES
(1,	'admin',	'<p>Tes</p>',	'2019-02-12 04:10:05'),
(2,	'fuck',	'<p>wkwkwkwkwk</p>',	'2019-02-18 00:14:45');

DROP TABLE IF EXISTS "cbt_siswa";
DROP SEQUENCE IF EXISTS "cbt_siswa_Urut_seq";
CREATE SEQUENCE "cbt_siswa_Urut_seq" INCREMENT  MINVALUE  MAXVALUE  START  CACHE ;

CREATE TABLE "public"."cbt_siswa" (
    "Urut" integer DEFAULT nextval('"cbt_siswa_Urut_seq"') NOT NULL,
    "XNomerUjian" character varying(20) NOT NULL,
    "XNIK" character varying(10) NOT NULL,
    "XKodeJurusan" character varying(20) NOT NULL,
    "XNamaSiswa" character varying(255) NOT NULL,
    "XKodeKelas" character varying(20) NOT NULL,
    "XJenisKelamin" character varying(1) NOT NULL,
    "XPassword" character varying(150) NOT NULL,
    "XFoto" character varying(250) DEFAULT 'nouser.png',
    "XAgama" character varying(20) NOT NULL,
    "XSetId" character varying(10) NOT NULL,
    "XSesi" character varying(11) NOT NULL,
    "XRuang" character varying(15) NOT NULL,
    "XPilihan" character varying(50),
    "XNamaKelas" character varying(20) NOT NULL,
    CONSTRAINT "cbt_siswa_XNIK_key" UNIQUE ("XNIK"),
    CONSTRAINT "cbt_siswa_XNomerUjian_key" UNIQUE ("XNomerUjian"),
    CONSTRAINT "cbt_siswa_pkey" PRIMARY KEY ("Urut"),
    CONSTRAINT "cbt_siswa_XNamaKelas_fkey" FOREIGN KEY ("XNamaKelas") REFERENCES cbt_kelas("XNamaKelas") ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE
) WITH (oids = false);

CREATE INDEX "cbt_siswa_XKodeJurusan" ON "public"."cbt_siswa" USING btree ("XKodeJurusan");

CREATE INDEX "cbt_siswa_XKodeKelas" ON "public"."cbt_siswa" USING btree ("XKodeKelas");

CREATE INDEX "cbt_siswa_XNamaKelas" ON "public"."cbt_siswa" USING btree ("XNamaKelas");


DROP TABLE IF EXISTS "cbt_siswa_ujian";
DROP SEQUENCE IF EXISTS "cbt_siswa_ujian_Urut_seq";
CREATE SEQUENCE "cbt_siswa_ujian_Urut_seq" INCREMENT  MINVALUE  MAXVALUE  START  CACHE ;

CREATE TABLE "public"."cbt_siswa_ujian" (
    "Urut" integer DEFAULT nextval('"cbt_siswa_ujian_Urut_seq"') NOT NULL,
    "XIdUjian" integer NOT NULL,
    "XNomerUjian" character varying(20) NOT NULL,
    "XMulaiUjian" timestamp DEFAULT now() NOT NULL,
    "XTokenUjian" character varying(60) NOT NULL,
    "XGetIP" character varying(20) NOT NULL,
    "XStatusUjian" integer DEFAULT '0' NOT NULL,
    "XSisaWaktu" integer DEFAULT '0' NOT NULL,
    CONSTRAINT "cbt_siswa_ujian_pkey" PRIMARY KEY ("Urut"),
    CONSTRAINT "cbt_siswa_ujian_XIdUjian_fkey" FOREIGN KEY ("XIdUjian") REFERENCES cbt_ujian("Urut") ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE,
    CONSTRAINT "cbt_siswa_ujian_XNomerUjian_fkey" FOREIGN KEY ("XNomerUjian") REFERENCES cbt_siswa("XNomerUjian") ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE
) WITH (oids = false);

CREATE INDEX "cbt_siswa_ujian_XNomerUjian" ON "public"."cbt_siswa_ujian" USING btree ("XNomerUjian");

CREATE INDEX "cbt_siswa_ujian_XTokenUjian" ON "public"."cbt_siswa_ujian" USING btree ("XTokenUjian");

CREATE INDEX "cbt_siswa_ujian_id_ujian" ON "public"."cbt_siswa_ujian" USING btree ("XIdUjian");


DROP TABLE IF EXISTS "cbt_soal";
DROP SEQUENCE IF EXISTS "cbt_soal_Urut_seq";
CREATE SEQUENCE "cbt_soal_Urut_seq" INCREMENT  MINVALUE  MAXVALUE  START  CACHE ;

CREATE TABLE "public"."cbt_soal" (
    "Urut" integer DEFAULT nextval('"cbt_soal_Urut_seq"') NOT NULL,
    "XKodeMapel" character varying(10) NOT NULL,
    "XKodeSoal" character varying(50) NOT NULL,
    "XJenisSoal" integer DEFAULT '1' NOT NULL,
    "XNomerSoal" integer NOT NULL,
    "XTanya" text NOT NULL,
    "XAudioTanya" character varying(255),
    "XVideoTanya" text,
    "XGambarTanya" text,
    "XJawab1" text NOT NULL,
    "XJawab2" text NOT NULL,
    "XJawab3" text,
    "XJawab4" text,
    "XJawab5" text,
    "XGambarJawab1" character varying(255),
    "XGambarJawab2" character varying(255),
    "XGambarJawab3" character varying(255),
    "XGambarJawab4" character varying(255),
    "XGambarJawab5" character varying(255),
    "XKunciJawaban" character varying(1) NOT NULL,
    "XKategori" integer DEFAULT '1' NOT NULL,
    "XAcakSoal" character(255) DEFAULT 'A' NOT NULL,
    "XAcakOpsi" character varying(1) NOT NULL,
    "XAgama" character(1),
    CONSTRAINT "cbt_soal_pkey" PRIMARY KEY ("Urut"),
    CONSTRAINT "cbt_soal_XKodeSoal_fkey" FOREIGN KEY ("XKodeSoal") REFERENCES cbt_paketsoal("XKodeSoal") ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE
) WITH (oids = false);

CREATE INDEX "cbt_soal_XKodeSoal" ON "public"."cbt_soal" USING btree ("XKodeSoal");

CREATE INDEX "cbt_soal_XNomerSoal" ON "public"."cbt_soal" USING btree ("XNomerSoal");


DROP TABLE IF EXISTS "cbt_tes";
DROP SEQUENCE IF EXISTS "cbt_tes_Urut_seq";
CREATE SEQUENCE "cbt_tes_Urut_seq" INCREMENT  MINVALUE  MAXVALUE  START  CACHE ;

CREATE TABLE "public"."cbt_tes" (
    "Urut" integer DEFAULT nextval('"cbt_tes_Urut_seq"') NOT NULL,
    "XKodeUjian" character varying(5) NOT NULL,
    "XNamaUjian" character varying(50) NOT NULL,
    CONSTRAINT "cbt_tes_pkey" PRIMARY KEY ("Urut")
) WITH (oids = false);

TRUNCATE "cbt_tes";
INSERT INTO "cbt_tes" ("Urut", "XKodeUjian", "XNamaUjian") VALUES
(1,	'PH',	'Penilaian Harian'),
(2,	'PTS',	'Penilaian Tengah Semester'),
(3,	'PAS',	'Penilaian Akhir Semester'),
(4,	'TO1',	'Try Out I'),
(5,	'TO2',	'Try Out II'),
(6,	'TO3',	'Try Out III'),
(7,	'TO4',	'Try Out IV'),
(8,	'TO5',	'Try Out V'),
(9,	'Modul',	'Pelajaran Online');

DROP TABLE IF EXISTS "cbt_ujian";
DROP SEQUENCE IF EXISTS "cbt_ujian_Urut_seq";
CREATE SEQUENCE "cbt_ujian_Urut_seq" INCREMENT  MINVALUE  MAXVALUE  START  CACHE ;

CREATE TABLE "public"."cbt_ujian" (
    "Urut" integer DEFAULT nextval('"cbt_ujian_Urut_seq"') NOT NULL,
    "XKodeUjian" character varying(10) NOT NULL,
    "XSemester" integer NOT NULL,
    "XKodeSoal" character varying(50) NOT NULL,
    "XLambat" character(255),
    "XTglUjian" timestamp NOT NULL,
    "XJamUjian" integer,
    "XBatasMasuk" timestamp NOT NULL,
    "XSisaWaktu" character varying(8),
    "XLamaUjian" character varying(8) NOT NULL,
    "XIdleTime" integer,
    "XTokenUjian" character varying(60) NOT NULL,
    "XGuru" character varying(30) NOT NULL,
    "XTglBuat" character varying(10) NOT NULL,
    "XSetId" character varying(10) NOT NULL,
    "XStatusUjian" character varying(1) NOT NULL,
    "XProktor" character varying(200),
    "XNIPProktor" character varying(50),
    "XPengawas" character varying(200),
    "XNIPPengawas" character varying(30),
    "XCatatan" text,
    "XSesi" character varying(11) DEFAULT '1' NOT NULL,
    "XTampil" integer NOT NULL,
    "XKodeSekolah" character varying(50) NOT NULL,
    "XStatusToken" character varying(1) NOT NULL,
    "XLevel" character varying(10),
    "XPdf" integer,
    "XFilePdf" character varying(200),
    "XListening" integer DEFAULT '1' NOT NULL,
    CONSTRAINT "cbt_ujian_XTokenUjian_key" UNIQUE ("XTokenUjian"),
    CONSTRAINT "cbt_ujian_pkey" PRIMARY KEY ("Urut"),
    CONSTRAINT "cbt_ujian_XGuru_fkey" FOREIGN KEY ("XGuru") REFERENCES cbt_user("Username") ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE,
    CONSTRAINT "cbt_ujian_XKodeSoal_fkey" FOREIGN KEY ("XKodeSoal") REFERENCES cbt_paketsoal("XKodeSoal") ON UPDATE CASCADE ON DELETE CASCADE NOT DEFERRABLE
) WITH (oids = false);

CREATE INDEX "cbt_ujian_XKodeSoal" ON "public"."cbt_ujian" USING btree ("XKodeSoal");

CREATE INDEX "cbt_ujian_token" ON "public"."cbt_ujian" USING btree ("XTokenUjian");


DROP TABLE IF EXISTS "cbt_user";
DROP SEQUENCE IF EXISTS "cbt_user_Urut_seq";
CREATE SEQUENCE "cbt_user_Urut_seq" INCREMENT  MINVALUE  MAXVALUE  START  CACHE ;

CREATE TABLE "public"."cbt_user" (
    "Urut" integer DEFAULT nextval('"cbt_user_Urut_seq"') NOT NULL,
    "Username" character varying(30) NOT NULL,
    "Password" character varying(250) NOT NULL,
    "NIP" character varying(30),
    "Nama" character varying(200),
    "Alamat" text,
    "HP" character varying(20),
    "Faxs" character varying(50),
    "Email" character varying(100),
    "login" integer NOT NULL,
    "Status" character(255) NOT NULL,
    "XFoto" character varying(50),
    CONSTRAINT "cbt_user_Username" UNIQUE ("Username"),
    CONSTRAINT "cbt_user_pkey" PRIMARY KEY ("Urut")
) WITH (oids = false);

TRUNCATE "cbt_user";
INSERT INTO "cbt_user" ("Urut", "Username", "Password", "NIP", "Nama", "Alamat", "HP", "Faxs", "Email", "login", "Status", "XFoto") VALUES
(9,	'admin',	'$6$SPangat$g7zqC7UruNNoBio9hcLYn9knFJt4iKTUfp/Som6XY2HKCP2gDrYh2NuEexV6z..Te00EG2uifjQ84AShyerre1',	'',	'Mohamad Supangat',	' AsdJln.kasegeran Rt9/2 Kasegeran, Cilongok, Banyumas',	'08387327241912',	'',	'supangatoy@gmail.com',	1,	'1                                                                                                                                                                                                                                                              ',	'image8231.png');

-- 2019-02-18 07:55:09.019579+07
