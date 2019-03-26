--
-- PostgreSQL database dump
--

-- Dumped from database version 11.1
-- Dumped by pg_dump version 11.1

-- Started on 2019-03-10 12:17:44 WIB

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 196 (class 1259 OID 28550)
-- Name: cbt_admin; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_admin (
    "Urut" integer NOT NULL,
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
    xinstall character varying(200) NOT NULL,
    "XPengumuman" text NOT NULL,
    "XTimeZone" character varying(20)
);


ALTER TABLE public.cbt_admin OWNER TO paijo;

--
-- TOC entry 197 (class 1259 OID 28556)
-- Name: cbt_admin_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_admin_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_admin_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3181 (class 0 OID 0)
-- Dependencies: 197
-- Name: cbt_admin_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_admin_Urut_seq" OWNED BY public.cbt_admin."Urut";


--
-- TOC entry 198 (class 1259 OID 28558)
-- Name: cbt_config; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_config (
    "Urut" integer NOT NULL,
    "XNilai" integer DEFAULT 0 NOT NULL,
    "XElearning" integer DEFAULT 0 NOT NULL,
    "XCbt" integer DEFAULT 0 NOT NULL,
    "XGuru2Admin" smallint DEFAULT '0'::smallint NOT NULL
);


ALTER TABLE public.cbt_config OWNER TO paijo;

--
-- TOC entry 199 (class 1259 OID 28565)
-- Name: cbt_config_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_config_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_config_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3182 (class 0 OID 0)
-- Dependencies: 199
-- Name: cbt_config_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_config_Urut_seq" OWNED BY public.cbt_config."Urut";


--
-- TOC entry 200 (class 1259 OID 28567)
-- Name: cbt_jawaban; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_jawaban (
    "Urutan" integer NOT NULL,
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
    "XJamPeriksa" character varying(8)
);


ALTER TABLE public.cbt_jawaban OWNER TO paijo;

--
-- TOC entry 201 (class 1259 OID 28570)
-- Name: cbt_jawaban_Urutan_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_jawaban_Urutan_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_jawaban_Urutan_seq" OWNER TO paijo;

--
-- TOC entry 3183 (class 0 OID 0)
-- Dependencies: 201
-- Name: cbt_jawaban_Urutan_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_jawaban_Urutan_seq" OWNED BY public.cbt_jawaban."Urutan";


--
-- TOC entry 202 (class 1259 OID 28572)
-- Name: cbt_kelas; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_kelas (
    "Urut" integer NOT NULL,
    "XNamaKelas" character varying(20) NOT NULL,
    "XKodeJurusan" character varying(20) NOT NULL,
    "XKodeKelas" character varying(10) NOT NULL,
    "XStatusKelas" character varying(1) NOT NULL
);


ALTER TABLE public.cbt_kelas OWNER TO paijo;

--
-- TOC entry 203 (class 1259 OID 28575)
-- Name: cbt_kelas_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_kelas_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_kelas_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3184 (class 0 OID 0)
-- Dependencies: 203
-- Name: cbt_kelas_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_kelas_Urut_seq" OWNED BY public.cbt_kelas."Urut";


--
-- TOC entry 204 (class 1259 OID 28577)
-- Name: cbt_mapel; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_mapel (
    "Urut" integer NOT NULL,
    "XKodeMapel" character varying(10) NOT NULL,
    "XNamaMapel" character varying(30) NOT NULL,
    "XKKM" double precision NOT NULL,
    "XMapelAgama" character(1) DEFAULT 'N'::bpchar NOT NULL
);


ALTER TABLE public.cbt_mapel OWNER TO paijo;

--
-- TOC entry 205 (class 1259 OID 28581)
-- Name: cbt_mapel_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_mapel_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_mapel_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3185 (class 0 OID 0)
-- Dependencies: 205
-- Name: cbt_mapel_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_mapel_Urut_seq" OWNED BY public.cbt_mapel."Urut";


--
-- TOC entry 206 (class 1259 OID 28583)
-- Name: cbt_nilai; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_nilai (
    "Urut" integer NOT NULL,
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
    "XStatus" character(255) NOT NULL
);


ALTER TABLE public.cbt_nilai OWNER TO paijo;

--
-- TOC entry 207 (class 1259 OID 28586)
-- Name: cbt_nilai_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_nilai_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_nilai_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3186 (class 0 OID 0)
-- Dependencies: 207
-- Name: cbt_nilai_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_nilai_Urut_seq" OWNED BY public.cbt_nilai."Urut";


--
-- TOC entry 208 (class 1259 OID 28588)
-- Name: cbt_paketmateri_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_paketmateri_Urut_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_paketmateri_Urut_seq" OWNER TO paijo;

--
-- TOC entry 209 (class 1259 OID 28590)
-- Name: cbt_paketmateri; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_paketmateri (
    "Urut" integer DEFAULT nextval('public."cbt_paketmateri_Urut_seq"'::regclass) NOT NULL,
    "XKodeKelas" character varying(10),
    "XKodeJurusan" character varying(10),
    "XKodeMapel" character varying(10) NOT NULL,
    "XGuru" character varying(30) NOT NULL,
    "XSetId" character varying(10) NOT NULL,
    "XStatusMateri" character varying(1) DEFAULT 'N'::character varying NOT NULL,
    "XTglBuat" date NOT NULL,
    "XKd" character varying(255) NOT NULL,
    "XIsiMateri" text,
    "XJudul" character varying(255) NOT NULL,
    "XKodeMateri" character varying(255) NOT NULL,
    "XFile" text,
    "XUjian" text,
    "XNamaKelas" text
);


ALTER TABLE public.cbt_paketmateri OWNER TO paijo;

--
-- TOC entry 3187 (class 0 OID 0)
-- Dependencies: 209
-- Name: COLUMN cbt_paketmateri."XJudul"; Type: COMMENT; Schema: public; Owner: paijo
--

COMMENT ON COLUMN public.cbt_paketmateri."XJudul" IS 'Judul materi pembelajaran';


--
-- TOC entry 3188 (class 0 OID 0)
-- Dependencies: 209
-- Name: COLUMN cbt_paketmateri."XKodeMateri"; Type: COMMENT; Schema: public; Owner: paijo
--

COMMENT ON COLUMN public.cbt_paketmateri."XKodeMateri" IS 'Kode Materi ';


--
-- TOC entry 3189 (class 0 OID 0)
-- Dependencies: 209
-- Name: COLUMN cbt_paketmateri."XFile"; Type: COMMENT; Schema: public; Owner: paijo
--

COMMENT ON COLUMN public.cbt_paketmateri."XFile" IS 'FIle yang dilampirkan';


--
-- TOC entry 3190 (class 0 OID 0)
-- Dependencies: 209
-- Name: COLUMN cbt_paketmateri."XNamaKelas"; Type: COMMENT; Schema: public; Owner: paijo
--

COMMENT ON COLUMN public.cbt_paketmateri."XNamaKelas" IS 'json kelas';


--
-- TOC entry 210 (class 1259 OID 28598)
-- Name: cbt_paketsoal; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_paketsoal (
    "Urut" integer NOT NULL,
    "XKodeKelas" character varying(10),
    "XKodeJurusan" character varying(10),
    "XKodeMapel" character varying(10) NOT NULL,
    "XPilGanda" integer NOT NULL,
    "XEsai" integer,
    "XPersenPil" integer NOT NULL,
    "XPersenEsai" integer,
    "XKodeSoal" character varying(50) NOT NULL,
    "XJumPilihan" integer DEFAULT 5 NOT NULL,
    "XJumSoal" integer,
    "JumUjian" integer,
    "XAcakSoal" character(1) DEFAULT 'Y'::bpchar NOT NULL,
    "XGuru" character varying(30) NOT NULL,
    "XSetId" character varying(10) NOT NULL,
    "XStatusSoal" character varying(1) DEFAULT 'N'::character varying NOT NULL,
    "XTglBuat" date NOT NULL,
    "XPaketSoal" text,
    "XSemua" character varying(10) DEFAULT 'T'::character varying NOT NULL,
    "XNamaKelas" text
);


ALTER TABLE public.cbt_paketsoal OWNER TO paijo;

--
-- TOC entry 211 (class 1259 OID 28608)
-- Name: cbt_paketsoal_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_paketsoal_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_paketsoal_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3191 (class 0 OID 0)
-- Dependencies: 211
-- Name: cbt_paketsoal_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_paketsoal_Urut_seq" OWNED BY public.cbt_paketsoal."Urut";


--
-- TOC entry 212 (class 1259 OID 28610)
-- Name: cbt_pelajaran; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_pelajaran (
    "Urut" integer NOT NULL,
    "XKodeMateri" character varying(255) NOT NULL,
    "XWaktuMulai" character varying(100) NOT NULL,
    "XWaktuAkhir" character varying(100) NOT NULL,
    "XTanya" integer DEFAULT 0 NOT NULL,
    "XStatusPelajaran" character varying(1) DEFAULT '1'::character varying NOT NULL,
    "XTokenPelajaran" character varying(100) NOT NULL,
    "XGuru" character varying(30) NOT NULL,
    "XTglBuat" date NOT NULL,
    "XStatusToken" character varying(1) NOT NULL
);


ALTER TABLE public.cbt_pelajaran OWNER TO paijo;

--
-- TOC entry 213 (class 1259 OID 28618)
-- Name: cbt_pelajaran_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_pelajaran_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_pelajaran_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3192 (class 0 OID 0)
-- Dependencies: 213
-- Name: cbt_pelajaran_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_pelajaran_Urut_seq" OWNED BY public.cbt_pelajaran."Urut";


--
-- TOC entry 214 (class 1259 OID 28620)
-- Name: cbt_pesan; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_pesan (
    "Urut" integer NOT NULL,
    "XGuru" character varying(20) NOT NULL,
    "XPesan" text NOT NULL,
    "XTgl" timestamp without time zone NOT NULL
);


ALTER TABLE public.cbt_pesan OWNER TO paijo;

--
-- TOC entry 215 (class 1259 OID 28626)
-- Name: cbt_pesan_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_pesan_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_pesan_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3193 (class 0 OID 0)
-- Dependencies: 215
-- Name: cbt_pesan_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_pesan_Urut_seq" OWNED BY public.cbt_pesan."Urut";


--
-- TOC entry 216 (class 1259 OID 28628)
-- Name: cbt_siswa; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_siswa (
    "Urut" integer NOT NULL,
    "XNomerUjian" character varying(20) NOT NULL,
    "XNIK" character varying(10) NOT NULL,
    "XKodeJurusan" character varying(20) NOT NULL,
    "XNamaSiswa" character varying(255) NOT NULL,
    "XKodeKelas" character varying(20) NOT NULL,
    "XJenisKelamin" character varying(1) NOT NULL,
    "XPassword" character varying(150) NOT NULL,
    "XFoto" character varying(250) DEFAULT 'nouser.png'::character varying,
    "XAgama" character varying(20) NOT NULL,
    "XSetId" character varying(10) NOT NULL,
    "XSesi" character varying(11),
    "XRuang" character varying(15),
    "XPilihan" character varying(50),
    "XNamaKelas" character varying(20) NOT NULL
);


ALTER TABLE public.cbt_siswa OWNER TO paijo;

--
-- TOC entry 217 (class 1259 OID 28635)
-- Name: cbt_siswa_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_siswa_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_siswa_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3194 (class 0 OID 0)
-- Dependencies: 217
-- Name: cbt_siswa_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_siswa_Urut_seq" OWNED BY public.cbt_siswa."Urut";


--
-- TOC entry 218 (class 1259 OID 28637)
-- Name: cbt_siswa_pelajaran_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_siswa_pelajaran_Urut_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_siswa_pelajaran_Urut_seq" OWNER TO paijo;

--
-- TOC entry 219 (class 1259 OID 28639)
-- Name: cbt_siswa_pelajaran; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_siswa_pelajaran (
    "Urut" integer DEFAULT nextval('public."cbt_siswa_pelajaran_Urut_seq"'::regclass) NOT NULL,
    "XIdPelajaran" integer NOT NULL,
    "XNomerUjian" character varying(20) NOT NULL,
    "XMulaiPelajaran" timestamp without time zone DEFAULT now() NOT NULL,
    "XTokenPelajaran" character varying(60) NOT NULL,
    "XGetIP" character varying(20) NOT NULL,
    "XStatusPelajaran" integer DEFAULT 0 NOT NULL,
    "XSisaWaktu" integer DEFAULT 0 NOT NULL
);


ALTER TABLE public.cbt_siswa_pelajaran OWNER TO paijo;

--
-- TOC entry 220 (class 1259 OID 28646)
-- Name: cbt_siswa_ujian; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_siswa_ujian (
    "Urut" integer NOT NULL,
    "XIdUjian" integer NOT NULL,
    "XNomerUjian" character varying(20) NOT NULL,
    "XMulaiUjian" timestamp without time zone DEFAULT now() NOT NULL,
    "XTokenUjian" character varying(60) NOT NULL,
    "XGetIP" character varying(20) NOT NULL,
    "XStatusUjian" integer DEFAULT 0 NOT NULL,
    "XSisaWaktu" integer DEFAULT 0 NOT NULL
);


ALTER TABLE public.cbt_siswa_ujian OWNER TO paijo;

--
-- TOC entry 221 (class 1259 OID 28652)
-- Name: cbt_siswa_ujian_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_siswa_ujian_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_siswa_ujian_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3195 (class 0 OID 0)
-- Dependencies: 221
-- Name: cbt_siswa_ujian_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_siswa_ujian_Urut_seq" OWNED BY public.cbt_siswa_ujian."Urut";


--
-- TOC entry 222 (class 1259 OID 28654)
-- Name: cbt_soal; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_soal (
    "Urut" integer NOT NULL,
    "XKodeMapel" character varying(10) NOT NULL,
    "XKodeSoal" character varying(50) NOT NULL,
    "XJenisSoal" integer DEFAULT 1 NOT NULL,
    "XNomerSoal" integer NOT NULL,
    "XTanya" text NOT NULL,
    "XAudioTanya" character varying(255),
    "XVideoTanya" character varying(255),
    "XGambarTanya" character varying(255),
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
    "XKategori" integer DEFAULT 1 NOT NULL,
    "XAcakSoal" character(255) DEFAULT 'A'::bpchar NOT NULL,
    "XAcakOpsi" character varying(1) NOT NULL,
    "XAgama" character(1)
);


ALTER TABLE public.cbt_soal OWNER TO paijo;

--
-- TOC entry 3196 (class 0 OID 0)
-- Dependencies: 222
-- Name: COLUMN cbt_soal."XAudioTanya"; Type: COMMENT; Schema: public; Owner: paijo
--

COMMENT ON COLUMN public.cbt_soal."XAudioTanya" IS 'File Audo / Musik';


--
-- TOC entry 3197 (class 0 OID 0)
-- Dependencies: 222
-- Name: COLUMN cbt_soal."XVideoTanya"; Type: COMMENT; Schema: public; Owner: paijo
--

COMMENT ON COLUMN public.cbt_soal."XVideoTanya" IS 'FIle Video';


--
-- TOC entry 3198 (class 0 OID 0)
-- Dependencies: 222
-- Name: COLUMN cbt_soal."XGambarTanya"; Type: COMMENT; Schema: public; Owner: paijo
--

COMMENT ON COLUMN public.cbt_soal."XGambarTanya" IS 'File Gambar';


--
-- TOC entry 223 (class 1259 OID 28663)
-- Name: cbt_soal_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_soal_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_soal_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3199 (class 0 OID 0)
-- Dependencies: 223
-- Name: cbt_soal_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_soal_Urut_seq" OWNED BY public.cbt_soal."Urut";


--
-- TOC entry 224 (class 1259 OID 28665)
-- Name: cbt_tanya_pelajaran; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_tanya_pelajaran (
    "Urut" integer NOT NULL,
    "XIdPelajaran" integer NOT NULL,
    "XNomerUjian" character varying(255) DEFAULT 'Nomer Ujian'::character varying,
    "XTanggal" character varying(100) NOT NULL,
    "XTanya" text NOT NULL,
    "XGuru" character varying(255),
    "XUser" integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.cbt_tanya_pelajaran OWNER TO paijo;

--
-- TOC entry 225 (class 1259 OID 28673)
-- Name: cbt_tanya_pelajaran_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_tanya_pelajaran_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_tanya_pelajaran_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3200 (class 0 OID 0)
-- Dependencies: 225
-- Name: cbt_tanya_pelajaran_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_tanya_pelajaran_Urut_seq" OWNED BY public.cbt_tanya_pelajaran."Urut";


--
-- TOC entry 226 (class 1259 OID 28675)
-- Name: cbt_tes; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_tes (
    "Urut" integer NOT NULL,
    "XKodeUjian" character varying(5) NOT NULL,
    "XNamaUjian" character varying(50) NOT NULL
);


ALTER TABLE public.cbt_tes OWNER TO paijo;

--
-- TOC entry 227 (class 1259 OID 28678)
-- Name: cbt_tes_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_tes_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_tes_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3201 (class 0 OID 0)
-- Dependencies: 227
-- Name: cbt_tes_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_tes_Urut_seq" OWNED BY public.cbt_tes."Urut";


--
-- TOC entry 228 (class 1259 OID 28680)
-- Name: cbt_ujian; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_ujian (
    "Urut" integer NOT NULL,
    "XKodeUjian" character varying(10) NOT NULL,
    "XSemester" integer NOT NULL,
    "XKodeSoal" character varying(50) NOT NULL,
    "XLambat" character(255),
    "XTglUjian" timestamp without time zone NOT NULL,
    "XJamUjian" integer,
    "XBatasMasuk" timestamp without time zone NOT NULL,
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
    "XSesi" character varying(11) DEFAULT '1'::character varying NOT NULL,
    "XTampil" integer NOT NULL,
    "XStatusToken" character varying(1) NOT NULL,
    "XLevel" character varying(10),
    "XPdf" integer,
    "XFilePdf" character varying(200),
    "XListening" integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.cbt_ujian OWNER TO paijo;

--
-- TOC entry 229 (class 1259 OID 28688)
-- Name: cbt_ujian_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_ujian_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_ujian_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3202 (class 0 OID 0)
-- Dependencies: 229
-- Name: cbt_ujian_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_ujian_Urut_seq" OWNED BY public.cbt_ujian."Urut";


--
-- TOC entry 230 (class 1259 OID 28690)
-- Name: cbt_user; Type: TABLE; Schema: public; Owner: paijo
--

CREATE TABLE public.cbt_user (
    "Urut" integer NOT NULL,
    "Username" character varying(30) NOT NULL,
    "Password" character varying(250) NOT NULL,
    "NIP" character varying(30),
    "Nama" character varying(200),
    "Alamat" text,
    "HP" character varying(20),
    "Faxs" character varying(50),
    "Email" character varying(100),
    login integer NOT NULL,
    "Status" character(255) NOT NULL,
    "XFoto" character varying(50),
    "XKelas" text
);


ALTER TABLE public.cbt_user OWNER TO paijo;

--
-- TOC entry 231 (class 1259 OID 28696)
-- Name: cbt_user_Urut_seq; Type: SEQUENCE; Schema: public; Owner: paijo
--

CREATE SEQUENCE public."cbt_user_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_user_Urut_seq" OWNER TO paijo;

--
-- TOC entry 3203 (class 0 OID 0)
-- Dependencies: 231
-- Name: cbt_user_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: paijo
--

ALTER SEQUENCE public."cbt_user_Urut_seq" OWNED BY public.cbt_user."Urut";


--
-- TOC entry 2886 (class 2604 OID 28698)
-- Name: cbt_admin Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_admin ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_admin_Urut_seq"'::regclass);


--
-- TOC entry 2891 (class 2604 OID 28699)
-- Name: cbt_config Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_config ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_config_Urut_seq"'::regclass);


--
-- TOC entry 2892 (class 2604 OID 28700)
-- Name: cbt_jawaban Urutan; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_jawaban ALTER COLUMN "Urutan" SET DEFAULT nextval('public."cbt_jawaban_Urutan_seq"'::regclass);


--
-- TOC entry 2893 (class 2604 OID 28701)
-- Name: cbt_kelas Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_kelas ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_kelas_Urut_seq"'::regclass);


--
-- TOC entry 2895 (class 2604 OID 28702)
-- Name: cbt_mapel Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_mapel ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_mapel_Urut_seq"'::regclass);


--
-- TOC entry 2896 (class 2604 OID 28703)
-- Name: cbt_nilai Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_nilai ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_nilai_Urut_seq"'::regclass);


--
-- TOC entry 2903 (class 2604 OID 28704)
-- Name: cbt_paketsoal Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_paketsoal ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_paketsoal_Urut_seq"'::regclass);


--
-- TOC entry 2906 (class 2604 OID 28705)
-- Name: cbt_pelajaran Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_pelajaran ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_pelajaran_Urut_seq"'::regclass);


--
-- TOC entry 2907 (class 2604 OID 28706)
-- Name: cbt_pesan Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_pesan ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_pesan_Urut_seq"'::regclass);


--
-- TOC entry 2909 (class 2604 OID 28707)
-- Name: cbt_siswa Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_siswa ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_siswa_Urut_seq"'::regclass);


--
-- TOC entry 2917 (class 2604 OID 28708)
-- Name: cbt_siswa_ujian Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_siswa_ujian ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_siswa_ujian_Urut_seq"'::regclass);


--
-- TOC entry 2921 (class 2604 OID 28709)
-- Name: cbt_soal Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_soal ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_soal_Urut_seq"'::regclass);


--
-- TOC entry 2924 (class 2604 OID 28710)
-- Name: cbt_tanya_pelajaran Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_tanya_pelajaran ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_tanya_pelajaran_Urut_seq"'::regclass);


--
-- TOC entry 2925 (class 2604 OID 28711)
-- Name: cbt_tes Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_tes ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_tes_Urut_seq"'::regclass);


--
-- TOC entry 2928 (class 2604 OID 28712)
-- Name: cbt_ujian Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_ujian ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_ujian_Urut_seq"'::regclass);


--
-- TOC entry 2929 (class 2604 OID 28713)
-- Name: cbt_user Urut; Type: DEFAULT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_user ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_user_Urut_seq"'::regclass);


--
-- TOC entry 3140 (class 0 OID 28550)
-- Dependencies: 196
-- Data for Name: cbt_admin; Type: TABLE DATA; Schema: public; Owner: paijo
--

INSERT INTO public.cbt_admin VALUES (1, 'SP E-elarning CBT v3.7', 'SMK/SMA/MA', '127.0.0.1', 'Jl. Raya Ajibarang KM 1', 'Ajibarang', 'Banyumas', 'Jawa Tengah', '083873272419', '083873272419', 'manusa@manusa.sch.id', 'logo_lp_maarif_svg2.png', 'banner.png', 'Zaenudin, S.Pd.,M.Si', '#F7F107', '1', 'SMK98678698789', '-', 'bg-2.png', '', '', 'Asia/Jakarta');


--
-- TOC entry 3142 (class 0 OID 28558)
-- Dependencies: 198
-- Data for Name: cbt_config; Type: TABLE DATA; Schema: public; Owner: paijo
--

INSERT INTO public.cbt_config VALUES (1, 0, 0, 1, 0);


--
-- TOC entry 3144 (class 0 OID 28567)
-- Dependencies: 200
-- Data for Name: cbt_jawaban; Type: TABLE DATA; Schema: public; Owner: paijo
--



--
-- TOC entry 3146 (class 0 OID 28572)
-- Dependencies: 202
-- Data for Name: cbt_kelas; Type: TABLE DATA; Schema: public; Owner: paijo
--

INSERT INTO public.cbt_user VALUES (1, 'admin', '$6$SPangat$186zmKxG2gD/JQIXVo9Bspw/sUnRdHUIblEdkI5/.ltycK1//fbJkiXTC0eV577mej.MoorBV7MKCxhxqYgqM.', '', 'Mohamad Supangat', ' Jl.Raya Ajibarang Km 1', '083873272419', '', 'supangatoy@gmail.com', 1, '1                                                                                                                                                                                                                                                              ', 'foto_biru.png', '');


--
-- TOC entry 3204 (class 0 OID 0)
-- Dependencies: 197
-- Name: cbt_admin_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_admin_Urut_seq"', 1, true);


--
-- TOC entry 3205 (class 0 OID 0)
-- Dependencies: 199
-- Name: cbt_config_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_config_Urut_seq"', 1, true);


--
-- TOC entry 3206 (class 0 OID 0)
-- Dependencies: 201
-- Name: cbt_jawaban_Urutan_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_jawaban_Urutan_seq"', 2303, true);


--
-- TOC entry 3207 (class 0 OID 0)
-- Dependencies: 203
-- Name: cbt_kelas_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_kelas_Urut_seq"', 82, true);


--
-- TOC entry 3208 (class 0 OID 0)
-- Dependencies: 205
-- Name: cbt_mapel_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_mapel_Urut_seq"', 140, true);


--
-- TOC entry 3209 (class 0 OID 0)
-- Dependencies: 207
-- Name: cbt_nilai_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_nilai_Urut_seq"', 99, true);


--
-- TOC entry 3210 (class 0 OID 0)
-- Dependencies: 208
-- Name: cbt_paketmateri_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_paketmateri_Urut_seq"', 12, true);


--
-- TOC entry 3211 (class 0 OID 0)
-- Dependencies: 211
-- Name: cbt_paketsoal_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_paketsoal_Urut_seq"', 74, true);


--
-- TOC entry 3212 (class 0 OID 0)
-- Dependencies: 213
-- Name: cbt_pelajaran_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_pelajaran_Urut_seq"', 5, true);


--
-- TOC entry 3213 (class 0 OID 0)
-- Dependencies: 215
-- Name: cbt_pesan_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_pesan_Urut_seq"', 7, true);


--
-- TOC entry 3214 (class 0 OID 0)
-- Dependencies: 217
-- Name: cbt_siswa_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_siswa_Urut_seq"', 13901, true);


--
-- TOC entry 3215 (class 0 OID 0)
-- Dependencies: 218
-- Name: cbt_siswa_pelajaran_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_siswa_pelajaran_Urut_seq"', 4, true);


--
-- TOC entry 3216 (class 0 OID 0)
-- Dependencies: 221
-- Name: cbt_siswa_ujian_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_siswa_ujian_Urut_seq"', 109, true);


--
-- TOC entry 3217 (class 0 OID 0)
-- Dependencies: 223
-- Name: cbt_soal_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_soal_Urut_seq"', 1453, true);


--
-- TOC entry 3218 (class 0 OID 0)
-- Dependencies: 225
-- Name: cbt_tanya_pelajaran_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_tanya_pelajaran_Urut_seq"', 156, true);


--
-- TOC entry 3219 (class 0 OID 0)
-- Dependencies: 227
-- Name: cbt_tes_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_tes_Urut_seq"', 9, true);


--
-- TOC entry 3220 (class 0 OID 0)
-- Dependencies: 229
-- Name: cbt_ujian_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_ujian_Urut_seq"', 23, true);


--
-- TOC entry 3221 (class 0 OID 0)
-- Dependencies: 231
-- Name: cbt_user_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: paijo
--

SELECT pg_catalog.setval('public."cbt_user_Urut_seq"', 82, true);


--
-- TOC entry 2931 (class 2606 OID 28715)
-- Name: cbt_admin cbt_admin_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_admin
    ADD CONSTRAINT cbt_admin_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2933 (class 2606 OID 28717)
-- Name: cbt_config cbt_config_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_config
    ADD CONSTRAINT cbt_config_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2939 (class 2606 OID 28719)
-- Name: cbt_jawaban cbt_jawaban_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_jawaban
    ADD CONSTRAINT cbt_jawaban_pkey PRIMARY KEY ("Urutan");


--
-- TOC entry 2943 (class 2606 OID 28721)
-- Name: cbt_kelas cbt_kelas_XNamaKelas_key; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_kelas
    ADD CONSTRAINT "cbt_kelas_XNamaKelas_key" UNIQUE ("XNamaKelas");


--
-- TOC entry 2945 (class 2606 OID 28723)
-- Name: cbt_kelas cbt_kelas_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_kelas
    ADD CONSTRAINT cbt_kelas_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2947 (class 2606 OID 28725)
-- Name: cbt_mapel cbt_mapel_XKodeMapel; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_mapel
    ADD CONSTRAINT "cbt_mapel_XKodeMapel" UNIQUE ("XKodeMapel");


--
-- TOC entry 2949 (class 2606 OID 28727)
-- Name: cbt_mapel cbt_mapel_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_mapel
    ADD CONSTRAINT cbt_mapel_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2951 (class 2606 OID 28729)
-- Name: cbt_nilai cbt_nilai_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_nilai
    ADD CONSTRAINT cbt_nilai_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2954 (class 2606 OID 28731)
-- Name: cbt_paketmateri cbt_paketmapel_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_paketmateri
    ADD CONSTRAINT cbt_paketmapel_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2956 (class 2606 OID 28733)
-- Name: cbt_paketmateri cbt_paketmateri_XKodeMateri; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_paketmateri
    ADD CONSTRAINT "cbt_paketmateri_XKodeMateri" UNIQUE ("XKodeMateri");


--
-- TOC entry 2960 (class 2606 OID 28735)
-- Name: cbt_paketsoal cbt_paketsoal_XKodeSoal_key; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_paketsoal
    ADD CONSTRAINT "cbt_paketsoal_XKodeSoal_key" UNIQUE ("XKodeSoal");


--
-- TOC entry 2962 (class 2606 OID 28737)
-- Name: cbt_paketsoal cbt_paketsoal_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_paketsoal
    ADD CONSTRAINT cbt_paketsoal_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2964 (class 2606 OID 28739)
-- Name: cbt_pelajaran cbt_pelajaran_Urut; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_pelajaran
    ADD CONSTRAINT "cbt_pelajaran_Urut" PRIMARY KEY ("Urut");


--
-- TOC entry 2966 (class 2606 OID 28741)
-- Name: cbt_pelajaran cbt_pelajaran_XTokenPelajaran; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_pelajaran
    ADD CONSTRAINT "cbt_pelajaran_XTokenPelajaran" UNIQUE ("XTokenPelajaran");


--
-- TOC entry 2969 (class 2606 OID 28743)
-- Name: cbt_pesan cbt_pesan_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_pesan
    ADD CONSTRAINT cbt_pesan_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2973 (class 2606 OID 28745)
-- Name: cbt_siswa cbt_siswa_XNIK_key; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_siswa
    ADD CONSTRAINT "cbt_siswa_XNIK_key" UNIQUE ("XNIK");


--
-- TOC entry 2976 (class 2606 OID 28747)
-- Name: cbt_siswa cbt_siswa_XNomerUjian_key; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_siswa
    ADD CONSTRAINT "cbt_siswa_XNomerUjian_key" UNIQUE ("XNomerUjian");


--
-- TOC entry 2983 (class 2606 OID 28749)
-- Name: cbt_siswa_pelajaran cbt_siswa_pelajaran_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_siswa_pelajaran
    ADD CONSTRAINT cbt_siswa_pelajaran_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2978 (class 2606 OID 28751)
-- Name: cbt_siswa cbt_siswa_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_siswa
    ADD CONSTRAINT cbt_siswa_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2988 (class 2606 OID 28753)
-- Name: cbt_siswa_ujian cbt_siswa_ujian_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_siswa_ujian
    ADD CONSTRAINT cbt_siswa_ujian_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2992 (class 2606 OID 28755)
-- Name: cbt_soal cbt_soal_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_soal
    ADD CONSTRAINT cbt_soal_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2994 (class 2606 OID 28757)
-- Name: cbt_tes cbt_tes_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_tes
    ADD CONSTRAINT cbt_tes_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2997 (class 2606 OID 28759)
-- Name: cbt_ujian cbt_ujian_XTokenUjian_key; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_ujian
    ADD CONSTRAINT "cbt_ujian_XTokenUjian_key" UNIQUE ("XTokenUjian");


--
-- TOC entry 2999 (class 2606 OID 28761)
-- Name: cbt_ujian cbt_ujian_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_ujian
    ADD CONSTRAINT cbt_ujian_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 3002 (class 2606 OID 28763)
-- Name: cbt_user cbt_user_Username; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_user
    ADD CONSTRAINT "cbt_user_Username" UNIQUE ("Username");


--
-- TOC entry 3004 (class 2606 OID 28765)
-- Name: cbt_user cbt_user_pkey; Type: CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_user
    ADD CONSTRAINT cbt_user_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2934 (class 1259 OID 28766)
-- Name: cbt_jawaban_XIdUjian; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_jawaban_XIdUjian" ON public.cbt_jawaban USING btree ("XIdUjian");


--
-- TOC entry 2935 (class 1259 OID 28767)
-- Name: cbt_jawaban_XNomerSoal; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_jawaban_XNomerSoal" ON public.cbt_jawaban USING btree ("XNomerSoal");


--
-- TOC entry 2936 (class 1259 OID 28768)
-- Name: cbt_jawaban_XNomerUjian; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_jawaban_XNomerUjian" ON public.cbt_jawaban USING btree ("XNomerUjian");


--
-- TOC entry 2937 (class 1259 OID 28769)
-- Name: cbt_jawaban_XTokenUjian; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_jawaban_XTokenUjian" ON public.cbt_jawaban USING btree ("XTokenUjian");


--
-- TOC entry 2940 (class 1259 OID 28770)
-- Name: cbt_kelas_XKodeJurusan; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_kelas_XKodeJurusan" ON public.cbt_kelas USING btree ("XKodeJurusan");


--
-- TOC entry 2941 (class 1259 OID 28771)
-- Name: cbt_kelas_XKodeKelas; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_kelas_XKodeKelas" ON public.cbt_kelas USING btree ("XKodeKelas");


--
-- TOC entry 2952 (class 1259 OID 28772)
-- Name: cbt_paketmapel_Urut; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_paketmapel_Urut" ON public.cbt_paketmateri USING btree ("Urut");


--
-- TOC entry 2957 (class 1259 OID 28773)
-- Name: cbt_paketsoal_Urut; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_paketsoal_Urut" ON public.cbt_paketsoal USING btree ("Urut");


--
-- TOC entry 2958 (class 1259 OID 28774)
-- Name: cbt_paketsoal_XGuru; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_paketsoal_XGuru" ON public.cbt_paketsoal USING btree ("XGuru");


--
-- TOC entry 2967 (class 1259 OID 28775)
-- Name: cbt_pesan_XGuru; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_pesan_XGuru" ON public.cbt_pesan USING btree ("XGuru");


--
-- TOC entry 2970 (class 1259 OID 28776)
-- Name: cbt_siswa_XKodeJurusan; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_siswa_XKodeJurusan" ON public.cbt_siswa USING btree ("XKodeJurusan");


--
-- TOC entry 2971 (class 1259 OID 28777)
-- Name: cbt_siswa_XKodeKelas; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_siswa_XKodeKelas" ON public.cbt_siswa USING btree ("XKodeKelas");


--
-- TOC entry 2974 (class 1259 OID 28778)
-- Name: cbt_siswa_XNamaKelas; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_siswa_XNamaKelas" ON public.cbt_siswa USING btree ("XNamaKelas");


--
-- TOC entry 2979 (class 1259 OID 28779)
-- Name: cbt_siswa_pelajaran_XNomerUjian; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_siswa_pelajaran_XNomerUjian" ON public.cbt_siswa_pelajaran USING btree ("XNomerUjian");


--
-- TOC entry 2980 (class 1259 OID 28780)
-- Name: cbt_siswa_pelajaran_XTokenPelajaran; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_siswa_pelajaran_XTokenPelajaran" ON public.cbt_siswa_pelajaran USING btree ("XTokenPelajaran");


--
-- TOC entry 2981 (class 1259 OID 28781)
-- Name: cbt_siswa_pelajaran_id_pelajaran; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX cbt_siswa_pelajaran_id_pelajaran ON public.cbt_siswa_pelajaran USING btree ("XIdPelajaran");


--
-- TOC entry 2984 (class 1259 OID 28782)
-- Name: cbt_siswa_ujian_XNomerUjian; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_siswa_ujian_XNomerUjian" ON public.cbt_siswa_ujian USING btree ("XNomerUjian");


--
-- TOC entry 2985 (class 1259 OID 28783)
-- Name: cbt_siswa_ujian_XTokenUjian; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_siswa_ujian_XTokenUjian" ON public.cbt_siswa_ujian USING btree ("XTokenUjian");


--
-- TOC entry 2986 (class 1259 OID 28784)
-- Name: cbt_siswa_ujian_id_ujian; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX cbt_siswa_ujian_id_ujian ON public.cbt_siswa_ujian USING btree ("XIdUjian");


--
-- TOC entry 2989 (class 1259 OID 28785)
-- Name: cbt_soal_XKodeSoal; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_soal_XKodeSoal" ON public.cbt_soal USING btree ("XKodeSoal");


--
-- TOC entry 2990 (class 1259 OID 28786)
-- Name: cbt_soal_XNomerSoal; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_soal_XNomerSoal" ON public.cbt_soal USING btree ("XNomerSoal");


--
-- TOC entry 2995 (class 1259 OID 28787)
-- Name: cbt_ujian_XKodeSoal; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX "cbt_ujian_XKodeSoal" ON public.cbt_ujian USING btree ("XKodeSoal");


--
-- TOC entry 3000 (class 1259 OID 28788)
-- Name: cbt_ujian_token; Type: INDEX; Schema: public; Owner: paijo
--

CREATE INDEX cbt_ujian_token ON public.cbt_ujian USING btree ("XTokenUjian");


--
-- TOC entry 3005 (class 2606 OID 28789)
-- Name: cbt_jawaban cbt_jawaban_XIdUjian_fkey; Type: FK CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_jawaban
    ADD CONSTRAINT "cbt_jawaban_XIdUjian_fkey" FOREIGN KEY ("XIdUjian") REFERENCES public.cbt_ujian("Urut") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3006 (class 2606 OID 28794)
-- Name: cbt_jawaban cbt_jawaban_XNomerUjian_fkey; Type: FK CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_jawaban
    ADD CONSTRAINT "cbt_jawaban_XNomerUjian_fkey" FOREIGN KEY ("XNomerUjian") REFERENCES public.cbt_siswa("XNomerUjian") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3007 (class 2606 OID 28799)
-- Name: cbt_nilai cbt_nilai_XNomerUjian_fkey; Type: FK CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_nilai
    ADD CONSTRAINT "cbt_nilai_XNomerUjian_fkey" FOREIGN KEY ("XNomerUjian") REFERENCES public.cbt_siswa("XNomerUjian") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3008 (class 2606 OID 28804)
-- Name: cbt_paketsoal cbt_paketsoal_XGuru_fkey; Type: FK CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_paketsoal
    ADD CONSTRAINT "cbt_paketsoal_XGuru_fkey" FOREIGN KEY ("XGuru") REFERENCES public.cbt_user("Username") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3009 (class 2606 OID 28809)
-- Name: cbt_paketsoal cbt_paketsoal_XKodeMapel_fkey; Type: FK CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_paketsoal
    ADD CONSTRAINT "cbt_paketsoal_XKodeMapel_fkey" FOREIGN KEY ("XKodeMapel") REFERENCES public.cbt_mapel("XKodeMapel") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3010 (class 2606 OID 28814)
-- Name: cbt_pelajaran cbt_pelajaran_XKodeMateri_fkey; Type: FK CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_pelajaran
    ADD CONSTRAINT "cbt_pelajaran_XKodeMateri_fkey" FOREIGN KEY ("XKodeMateri") REFERENCES public.cbt_paketmateri("XKodeMateri") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3011 (class 2606 OID 28819)
-- Name: cbt_siswa cbt_siswa_XNamaKelas_fkey; Type: FK CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_siswa
    ADD CONSTRAINT "cbt_siswa_XNamaKelas_fkey" FOREIGN KEY ("XNamaKelas") REFERENCES public.cbt_kelas("XNamaKelas") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3012 (class 2606 OID 28824)
-- Name: cbt_siswa_pelajaran cbt_siswa_pelajaran_XIdPelajaran_fkey; Type: FK CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_siswa_pelajaran
    ADD CONSTRAINT "cbt_siswa_pelajaran_XIdPelajaran_fkey" FOREIGN KEY ("XIdPelajaran") REFERENCES public.cbt_pelajaran("Urut") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3013 (class 2606 OID 28829)
-- Name: cbt_siswa_pelajaran cbt_siswa_pelajaran_XNomerUjian_fkey; Type: FK CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_siswa_pelajaran
    ADD CONSTRAINT "cbt_siswa_pelajaran_XNomerUjian_fkey" FOREIGN KEY ("XNomerUjian") REFERENCES public.cbt_siswa("XNomerUjian") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3014 (class 2606 OID 28834)
-- Name: cbt_siswa_ujian cbt_siswa_ujian_XIdUjian_fkey; Type: FK CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_siswa_ujian
    ADD CONSTRAINT "cbt_siswa_ujian_XIdUjian_fkey" FOREIGN KEY ("XIdUjian") REFERENCES public.cbt_ujian("Urut") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3015 (class 2606 OID 28839)
-- Name: cbt_siswa_ujian cbt_siswa_ujian_XNomerUjian_fkey; Type: FK CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_siswa_ujian
    ADD CONSTRAINT "cbt_siswa_ujian_XNomerUjian_fkey" FOREIGN KEY ("XNomerUjian") REFERENCES public.cbt_siswa("XNomerUjian") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3016 (class 2606 OID 28844)
-- Name: cbt_soal cbt_soal_XKodeSoal_fkey; Type: FK CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_soal
    ADD CONSTRAINT "cbt_soal_XKodeSoal_fkey" FOREIGN KEY ("XKodeSoal") REFERENCES public.cbt_paketsoal("XKodeSoal") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3017 (class 2606 OID 28849)
-- Name: cbt_ujian cbt_ujian_XGuru_fkey; Type: FK CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_ujian
    ADD CONSTRAINT "cbt_ujian_XGuru_fkey" FOREIGN KEY ("XGuru") REFERENCES public.cbt_user("Username") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3018 (class 2606 OID 28854)
-- Name: cbt_ujian cbt_ujian_XKodeSoal_fkey; Type: FK CONSTRAINT; Schema: public; Owner: paijo
--

ALTER TABLE ONLY public.cbt_ujian
    ADD CONSTRAINT "cbt_ujian_XKodeSoal_fkey" FOREIGN KEY ("XKodeSoal") REFERENCES public.cbt_paketsoal("XKodeSoal") ON UPDATE CASCADE ON DELETE CASCADE;


-- Completed on 2019-03-10 12:17:46 WIB

--
-- PostgreSQL database dump complete
--

