--
-- PostgreSQL database dump
--

-- Dumped from database version 11.2 (Debian 11.2-1.pgdg90+1)
-- Dumped by pg_dump version 11.2

-- Started on 2019-05-17 15:51:08 UTC

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
-- TOC entry 196 (class 1259 OID 34172)
-- Name: cbt_admin; Type: TABLE; Schema: public; Owner: postgres
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
    "XTimeZone" character varying(20),
    "XServer" boolean DEFAULT false NOT NULL,
    "XIdServer" character varying(20) DEFAULT '00000'::character varying NOT NULL,
    "XHostServer" character varying(100) DEFAULT 'http://localhost'::character varying NOT NULL,
    "XToken" character varying(6) DEFAULT ''::character varying NOT NULL,
    "LastSync" character varying(12) DEFAULT '0'::character varying NOT NULL
);


ALTER TABLE public.cbt_admin OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 34178)
-- Name: cbt_admin_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_admin_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_admin_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3186 (class 0 OID 0)
-- Dependencies: 197
-- Name: cbt_admin_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_admin_Urut_seq" OWNED BY public.cbt_admin."Urut";


--
-- TOC entry 233 (class 1259 OID 34489)
-- Name: cbt_client; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cbt_client (
    "Urut" integer NOT NULL,
    "XNama" character varying(50) NOT NULL,
    "XIdServer" character varying(50) NOT NULL,
    "XToken" character varying(6) DEFAULT ''::character varying NOT NULL,
    "LastSync" character varying(12) DEFAULT '0'::character varying NOT NULL,
    "XStatus" boolean DEFAULT false NOT NULL
);


ALTER TABLE public.cbt_client OWNER TO postgres;

--
-- TOC entry 232 (class 1259 OID 34487)
-- Name: cbt_cleint_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_cleint_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_cleint_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3187 (class 0 OID 0)
-- Dependencies: 232
-- Name: cbt_cleint_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_cleint_Urut_seq" OWNED BY public.cbt_client."Urut";


--
-- TOC entry 198 (class 1259 OID 34180)
-- Name: cbt_config; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cbt_config (
    "Urut" integer NOT NULL,
    "XNilai" integer DEFAULT 0 NOT NULL,
    "XElearning" integer DEFAULT 0 NOT NULL,
    "XCbt" integer DEFAULT 0 NOT NULL,
    "XGuru2Admin" smallint DEFAULT '0'::smallint NOT NULL
);


ALTER TABLE public.cbt_config OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 34187)
-- Name: cbt_config_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_config_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_config_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3188 (class 0 OID 0)
-- Dependencies: 199
-- Name: cbt_config_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_config_Urut_seq" OWNED BY public.cbt_config."Urut";


--
-- TOC entry 200 (class 1259 OID 34189)
-- Name: cbt_jawaban; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cbt_jawaban (
    "Urutan" integer NOT NULL,
    "Urut" integer NOT NULL,
    "XNomerSoal" integer NOT NULL,
    "XIdUjian" integer NOT NULL,
    "XNomerUjian" character varying(20) NOT NULL,
    "XTokenUjian" character varying(5) NOT NULL,
    "XA" integer,
    "XB" integer,
    "XC" integer,
    "XD" integer,
    "XE" integer,
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


ALTER TABLE public.cbt_jawaban OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 34192)
-- Name: cbt_jawaban_Urutan_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_jawaban_Urutan_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_jawaban_Urutan_seq" OWNER TO postgres;

--
-- TOC entry 3189 (class 0 OID 0)
-- Dependencies: 201
-- Name: cbt_jawaban_Urutan_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_jawaban_Urutan_seq" OWNED BY public.cbt_jawaban."Urutan";


--
-- TOC entry 202 (class 1259 OID 34194)
-- Name: cbt_kelas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cbt_kelas (
    "Urut" integer NOT NULL,
    "XNamaKelas" character varying(20) NOT NULL,
    "XKodeJurusan" character varying(20) NOT NULL,
    "XKodeKelas" character varying(10) NOT NULL,
    "XStatusKelas" character varying(1) NOT NULL,
    "LastSync" character varying(12) DEFAULT '0'::character varying NOT NULL,
    "LastUpdate" character varying(12) DEFAULT '0'::character varying NOT NULL
);


ALTER TABLE public.cbt_kelas OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 34197)
-- Name: cbt_kelas_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_kelas_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_kelas_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3190 (class 0 OID 0)
-- Dependencies: 203
-- Name: cbt_kelas_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_kelas_Urut_seq" OWNED BY public.cbt_kelas."Urut";


--
-- TOC entry 204 (class 1259 OID 34199)
-- Name: cbt_mapel; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cbt_mapel (
    "Urut" integer NOT NULL,
    "XKodeMapel" character varying(10) NOT NULL,
    "XNamaMapel" character varying(30) NOT NULL,
    "XKKM" double precision NOT NULL,
    "XMapelAgama" character(1) DEFAULT 'N'::bpchar NOT NULL,
    "LastSync" character varying(12) DEFAULT '0'::character varying NOT NULL,
    "LastUpdate" character varying(12) DEFAULT '0'::character varying NOT NULL
);


ALTER TABLE public.cbt_mapel OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 34203)
-- Name: cbt_mapel_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_mapel_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_mapel_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3191 (class 0 OID 0)
-- Dependencies: 205
-- Name: cbt_mapel_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_mapel_Urut_seq" OWNED BY public.cbt_mapel."Urut";


--
-- TOC entry 206 (class 1259 OID 34205)
-- Name: cbt_nilai; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.cbt_nilai OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 34208)
-- Name: cbt_nilai_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_nilai_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_nilai_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3192 (class 0 OID 0)
-- Dependencies: 207
-- Name: cbt_nilai_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_nilai_Urut_seq" OWNED BY public.cbt_nilai."Urut";


--
-- TOC entry 208 (class 1259 OID 34210)
-- Name: cbt_paketmateri_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_paketmateri_Urut_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_paketmateri_Urut_seq" OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 34212)
-- Name: cbt_paketmateri; Type: TABLE; Schema: public; Owner: postgres
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
    "XNamaKelas" text,
    "LastSync" character varying(12) DEFAULT '0'::character varying NOT NULL,
    "LastUpdate" character varying(12) DEFAULT '0'::character varying NOT NULL
);


ALTER TABLE public.cbt_paketmateri OWNER TO postgres;

--
-- TOC entry 3193 (class 0 OID 0)
-- Dependencies: 209
-- Name: COLUMN cbt_paketmateri."XJudul"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cbt_paketmateri."XJudul" IS 'Judul materi pembelajaran';


--
-- TOC entry 3194 (class 0 OID 0)
-- Dependencies: 209
-- Name: COLUMN cbt_paketmateri."XKodeMateri"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cbt_paketmateri."XKodeMateri" IS 'Kode Materi ';


--
-- TOC entry 3195 (class 0 OID 0)
-- Dependencies: 209
-- Name: COLUMN cbt_paketmateri."XFile"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cbt_paketmateri."XFile" IS 'FIle yang dilampirkan';


--
-- TOC entry 3196 (class 0 OID 0)
-- Dependencies: 209
-- Name: COLUMN cbt_paketmateri."XNamaKelas"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cbt_paketmateri."XNamaKelas" IS 'json kelas';


--
-- TOC entry 210 (class 1259 OID 34220)
-- Name: cbt_paketsoal; Type: TABLE; Schema: public; Owner: postgres
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
    "XNamaKelas" text,
    "LastSync" character varying(12) DEFAULT '0'::character varying NOT NULL,
    "LastUpdate" character varying(12) DEFAULT '0'::character varying NOT NULL
);


ALTER TABLE public.cbt_paketsoal OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 34230)
-- Name: cbt_paketsoal_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_paketsoal_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_paketsoal_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3197 (class 0 OID 0)
-- Dependencies: 211
-- Name: cbt_paketsoal_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_paketsoal_Urut_seq" OWNED BY public.cbt_paketsoal."Urut";


--
-- TOC entry 212 (class 1259 OID 34232)
-- Name: cbt_pelajaran; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cbt_pelajaran (
    "Urut" integer NOT NULL,
    "XKodeMateri" character varying(255) NOT NULL,
    "XTanya" integer DEFAULT 0 NOT NULL,
    "XStatusPelajaran" character varying(1) DEFAULT '1'::character varying NOT NULL,
    "XTokenPelajaran" character varying(100) NOT NULL,
    "XGuru" character varying(30) NOT NULL,
    "XTglBuat" date NOT NULL,
    "XStatusToken" character varying(1) NOT NULL,
    "XWaktuMulai" timestamp without time zone NOT NULL,
    "XWaktuAkhir" timestamp without time zone NOT NULL,
    "LastSync" character varying(12) DEFAULT '0'::character varying NOT NULL,
    "LastUpdate" character varying(12) DEFAULT '0'::character varying NOT NULL
);


ALTER TABLE public.cbt_pelajaran OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 34240)
-- Name: cbt_pelajaran_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_pelajaran_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_pelajaran_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3198 (class 0 OID 0)
-- Dependencies: 213
-- Name: cbt_pelajaran_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_pelajaran_Urut_seq" OWNED BY public.cbt_pelajaran."Urut";


--
-- TOC entry 214 (class 1259 OID 34242)
-- Name: cbt_pesan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cbt_pesan (
    "Urut" integer NOT NULL,
    "XGuru" character varying(20) NOT NULL,
    "XPesan" text NOT NULL,
    "XTgl" timestamp without time zone NOT NULL
);


ALTER TABLE public.cbt_pesan OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 34248)
-- Name: cbt_pesan_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_pesan_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_pesan_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3199 (class 0 OID 0)
-- Dependencies: 215
-- Name: cbt_pesan_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_pesan_Urut_seq" OWNED BY public.cbt_pesan."Urut";


--
-- TOC entry 216 (class 1259 OID 34250)
-- Name: cbt_siswa; Type: TABLE; Schema: public; Owner: postgres
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
    "XNamaKelas" character varying(20) NOT NULL,
    "LastSync" character varying(12) DEFAULT '0'::character varying NOT NULL,
    "LastUpdate" character varying(12) DEFAULT '0'::character varying NOT NULL
);


ALTER TABLE public.cbt_siswa OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 34257)
-- Name: cbt_siswa_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_siswa_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_siswa_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3200 (class 0 OID 0)
-- Dependencies: 217
-- Name: cbt_siswa_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_siswa_Urut_seq" OWNED BY public.cbt_siswa."Urut";


--
-- TOC entry 218 (class 1259 OID 34259)
-- Name: cbt_siswa_pelajaran_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_siswa_pelajaran_Urut_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_siswa_pelajaran_Urut_seq" OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 34261)
-- Name: cbt_siswa_pelajaran; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cbt_siswa_pelajaran (
    "Urut" integer DEFAULT nextval('public."cbt_siswa_pelajaran_Urut_seq"'::regclass) NOT NULL,
    "XIdPelajaran" integer NOT NULL,
    "XNomerUjian" character varying(20) NOT NULL,
    "XMulaiPelajaran" timestamp without time zone DEFAULT now() NOT NULL,
    "XTokenPelajaran" character varying(60) NOT NULL,
    "XGetIP" character varying(20) NOT NULL,
    "XStatusPelajaran" integer DEFAULT 0 NOT NULL,
    "XSisaWaktu" integer DEFAULT 0 NOT NULL,
    "LastSync" character varying(12) DEFAULT '0'::character varying NOT NULL,
    "LastUpdate" character varying(12) DEFAULT '0'::character varying NOT NULL
);


ALTER TABLE public.cbt_siswa_pelajaran OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 34268)
-- Name: cbt_siswa_ujian; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cbt_siswa_ujian (
    "Urut" integer NOT NULL,
    "XIdUjian" integer NOT NULL,
    "XNomerUjian" character varying(20) NOT NULL,
    "XMulaiUjian" timestamp without time zone DEFAULT now() NOT NULL,
    "XTokenUjian" character varying(60) NOT NULL,
    "XGetIP" character varying(20) NOT NULL,
    "XStatusUjian" integer DEFAULT 0 NOT NULL,
    "XSisaWaktu" integer DEFAULT 0 NOT NULL,
    "LastSync" character varying(12) DEFAULT '0'::character varying NOT NULL,
    "LastUpdate" character varying(12) DEFAULT '0'::character varying NOT NULL
);


ALTER TABLE public.cbt_siswa_ujian OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 34274)
-- Name: cbt_siswa_ujian_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_siswa_ujian_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_siswa_ujian_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3201 (class 0 OID 0)
-- Dependencies: 221
-- Name: cbt_siswa_ujian_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_siswa_ujian_Urut_seq" OWNED BY public.cbt_siswa_ujian."Urut";


--
-- TOC entry 222 (class 1259 OID 34276)
-- Name: cbt_soal; Type: TABLE; Schema: public; Owner: postgres
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
    "XAgama" character(1),
    "LastSync" character varying(12) DEFAULT '0'::character varying NOT NULL,
    "LastUpdate" character varying(12) DEFAULT '0'::character varying NOT NULL
);


ALTER TABLE public.cbt_soal OWNER TO postgres;

--
-- TOC entry 3202 (class 0 OID 0)
-- Dependencies: 222
-- Name: COLUMN cbt_soal."XAudioTanya"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cbt_soal."XAudioTanya" IS 'File Audo / Musik';


--
-- TOC entry 3203 (class 0 OID 0)
-- Dependencies: 222
-- Name: COLUMN cbt_soal."XVideoTanya"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cbt_soal."XVideoTanya" IS 'FIle Video';


--
-- TOC entry 3204 (class 0 OID 0)
-- Dependencies: 222
-- Name: COLUMN cbt_soal."XGambarTanya"; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.cbt_soal."XGambarTanya" IS 'File Gambar';


--
-- TOC entry 223 (class 1259 OID 34285)
-- Name: cbt_soal_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_soal_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_soal_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3205 (class 0 OID 0)
-- Dependencies: 223
-- Name: cbt_soal_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_soal_Urut_seq" OWNED BY public.cbt_soal."Urut";


--
-- TOC entry 224 (class 1259 OID 34287)
-- Name: cbt_tanya_pelajaran; Type: TABLE; Schema: public; Owner: postgres
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


ALTER TABLE public.cbt_tanya_pelajaran OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 34295)
-- Name: cbt_tanya_pelajaran_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_tanya_pelajaran_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_tanya_pelajaran_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3206 (class 0 OID 0)
-- Dependencies: 225
-- Name: cbt_tanya_pelajaran_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_tanya_pelajaran_Urut_seq" OWNED BY public.cbt_tanya_pelajaran."Urut";


--
-- TOC entry 226 (class 1259 OID 34297)
-- Name: cbt_tes; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cbt_tes (
    "Urut" integer NOT NULL,
    "XKodeUjian" character varying(5) NOT NULL,
    "XNamaUjian" character varying(50) NOT NULL
);


ALTER TABLE public.cbt_tes OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 34300)
-- Name: cbt_tes_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_tes_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_tes_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3207 (class 0 OID 0)
-- Dependencies: 227
-- Name: cbt_tes_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_tes_Urut_seq" OWNED BY public.cbt_tes."Urut";


--
-- TOC entry 228 (class 1259 OID 34302)
-- Name: cbt_ujian; Type: TABLE; Schema: public; Owner: postgres
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
    "XListening" integer DEFAULT 1 NOT NULL,
    "LastSync" character varying(12) DEFAULT '0'::character varying NOT NULL,
    "LastUpdate" character varying(12) DEFAULT '0'::character varying NOT NULL
);


ALTER TABLE public.cbt_ujian OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 34310)
-- Name: cbt_ujian_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_ujian_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_ujian_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3208 (class 0 OID 0)
-- Dependencies: 229
-- Name: cbt_ujian_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_ujian_Urut_seq" OWNED BY public.cbt_ujian."Urut";


--
-- TOC entry 230 (class 1259 OID 34312)
-- Name: cbt_user; Type: TABLE; Schema: public; Owner: postgres
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
    "XKelas" text,
    "LastSync" character varying(12) DEFAULT '0'::character varying NOT NULL,
    "LastUpdate" character varying(12) DEFAULT '0'::character varying NOT NULL
);


ALTER TABLE public.cbt_user OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 34318)
-- Name: cbt_user_Urut_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."cbt_user_Urut_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."cbt_user_Urut_seq" OWNER TO postgres;

--
-- TOC entry 3209 (class 0 OID 0)
-- Dependencies: 231
-- Name: cbt_user_Urut_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."cbt_user_Urut_seq" OWNED BY public.cbt_user."Urut";


--
-- TOC entry 2858 (class 2604 OID 34320)
-- Name: cbt_admin Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_admin ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_admin_Urut_seq"'::regclass);


--
-- TOC entry 2929 (class 2604 OID 34492)
-- Name: cbt_client Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_client ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_cleint_Urut_seq"'::regclass);


--
-- TOC entry 2868 (class 2604 OID 34321)
-- Name: cbt_config Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_config ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_config_Urut_seq"'::regclass);


--
-- TOC entry 2869 (class 2604 OID 34322)
-- Name: cbt_jawaban Urutan; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_jawaban ALTER COLUMN "Urutan" SET DEFAULT nextval('public."cbt_jawaban_Urutan_seq"'::regclass);


--
-- TOC entry 2870 (class 2604 OID 34323)
-- Name: cbt_kelas Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_kelas ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_kelas_Urut_seq"'::regclass);


--
-- TOC entry 2874 (class 2604 OID 34324)
-- Name: cbt_mapel Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_mapel ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_mapel_Urut_seq"'::regclass);


--
-- TOC entry 2877 (class 2604 OID 34325)
-- Name: cbt_nilai Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_nilai ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_nilai_Urut_seq"'::regclass);


--
-- TOC entry 2886 (class 2604 OID 34326)
-- Name: cbt_paketsoal Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_paketsoal ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_paketsoal_Urut_seq"'::regclass);


--
-- TOC entry 2891 (class 2604 OID 34327)
-- Name: cbt_pelajaran Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_pelajaran ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_pelajaran_Urut_seq"'::regclass);


--
-- TOC entry 2894 (class 2604 OID 34328)
-- Name: cbt_pesan Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_pesan ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_pesan_Urut_seq"'::regclass);


--
-- TOC entry 2896 (class 2604 OID 34329)
-- Name: cbt_siswa Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_siswa ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_siswa_Urut_seq"'::regclass);


--
-- TOC entry 2908 (class 2604 OID 34330)
-- Name: cbt_siswa_ujian Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_siswa_ujian ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_siswa_ujian_Urut_seq"'::regclass);


--
-- TOC entry 2914 (class 2604 OID 34331)
-- Name: cbt_soal Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_soal ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_soal_Urut_seq"'::regclass);


--
-- TOC entry 2919 (class 2604 OID 34332)
-- Name: cbt_tanya_pelajaran Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_tanya_pelajaran ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_tanya_pelajaran_Urut_seq"'::regclass);


--
-- TOC entry 2920 (class 2604 OID 34333)
-- Name: cbt_tes Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_tes ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_tes_Urut_seq"'::regclass);


--
-- TOC entry 2923 (class 2604 OID 34334)
-- Name: cbt_ujian Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_ujian ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_ujian_Urut_seq"'::regclass);


--
-- TOC entry 2926 (class 2604 OID 34335)
-- Name: cbt_user Urut; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_user ALTER COLUMN "Urut" SET DEFAULT nextval('public."cbt_user_Urut_seq"'::regclass);


--
-- TOC entry 3143 (class 0 OID 34172)
-- Dependencies: 196
-- Data for Name: cbt_admin; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.cbt_admin ("Urut", "XSekolah", "XTingkat", "XIp", "XAlamat", "XKec", "XKab", "XProp", "XTelp", "XFax", "XEmail", "XLogo", "XBanner", "XKepSek", "XWarna", "XStatus", "XKodeSekolah", "XNIPKepsek", "XLogin", xinstall, "XPengumuman", "XTimeZone", "XServer", "XIdServer", "XHostServer", "XToken", "LastSync") VALUES (1, 'SP E-elarning CBT v3.7', 'SMK/SMA/MA', '127.0.0.1', 'Jl. Raya Ajibarang KM 1', 'Ajibarang', 'Banyumas', 'Jawa Tengah', '083873272419', '083873272419', 'manusa@manusa.sch.id', 'logo_lp_maarif_svg2.png', 'banner.png', 'Zaenudin, S.Pd.,M.Si', '#F7F107', '1', 'SMK98678698789', '-', 'bg-2.png', '', '', 'Asia/Jakarta', true, 'LAB4', 'http://172.18.0.1/project/cbt_new/', '', '1558078641');


--
-- TOC entry 3180 (class 0 OID 34489)
-- Dependencies: 233
-- Data for Name: cbt_client; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.cbt_client ("Urut", "XNama", "XIdServer", "XToken", "LastSync", "XStatus") VALUES (4, 'Lab4', 'LAB4', '', '0', true);


--
-- TOC entry 3145 (class 0 OID 34180)
-- Dependencies: 198
-- Data for Name: cbt_config; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.cbt_config ("Urut", "XNilai", "XElearning", "XCbt", "XGuru2Admin") VALUES (1, 0, 1, 1, 0);


--
-- TOC entry 3147 (class 0 OID 34189)
-- Dependencies: 200
-- Data for Name: cbt_jawaban; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3149 (class 0 OID 34194)
-- Dependencies: 202
-- Data for Name: cbt_kelas; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3151 (class 0 OID 34199)
-- Dependencies: 204
-- Data for Name: cbt_mapel; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3153 (class 0 OID 34205)
-- Dependencies: 206
-- Data for Name: cbt_nilai; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3156 (class 0 OID 34212)
-- Dependencies: 209
-- Data for Name: cbt_paketmateri; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3157 (class 0 OID 34220)
-- Dependencies: 210
-- Data for Name: cbt_paketsoal; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3159 (class 0 OID 34232)
-- Dependencies: 212
-- Data for Name: cbt_pelajaran; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3161 (class 0 OID 34242)
-- Dependencies: 214
-- Data for Name: cbt_pesan; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3163 (class 0 OID 34250)
-- Dependencies: 216
-- Data for Name: cbt_siswa; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3166 (class 0 OID 34261)
-- Dependencies: 219
-- Data for Name: cbt_siswa_pelajaran; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3167 (class 0 OID 34268)
-- Dependencies: 220
-- Data for Name: cbt_siswa_ujian; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3169 (class 0 OID 34276)
-- Dependencies: 222
-- Data for Name: cbt_soal; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3171 (class 0 OID 34287)
-- Dependencies: 224
-- Data for Name: cbt_tanya_pelajaran; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3173 (class 0 OID 34297)
-- Dependencies: 226
-- Data for Name: cbt_tes; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.cbt_tes ("Urut", "XKodeUjian", "XNamaUjian") VALUES (10, 'UTS', 'Ulangan Tengah Semester');


--
-- TOC entry 3175 (class 0 OID 34302)
-- Dependencies: 228
-- Data for Name: cbt_ujian; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3177 (class 0 OID 34312)
-- Dependencies: 230
-- Data for Name: cbt_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.cbt_user ("Urut", "Username", "Password", "NIP", "Nama", "Alamat", "HP", "Faxs", "Email", login, "Status", "XFoto", "XKelas", "LastSync", "LastUpdate") VALUES (1, 'admin', '$6$SPangat$g7zqC7UruNNoBio9hcLYn9knFJt4iKTUfp/Som6XY2HKCP2gDrYh2NuEexV6z..Te00EG2uifjQ84AShyerre1', '', 'Mohamad Supangat', ' Jl.Raya Ajibarang Km 1', '083873272419', '', 'supangatoy@gmail.com', 1, '1                                                                                                                                                                                                                                                              ', 'foto_biru.png', '', '0', '0');


--
-- TOC entry 3210 (class 0 OID 0)
-- Dependencies: 197
-- Name: cbt_admin_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_admin_Urut_seq"', 1, true);


--
-- TOC entry 3211 (class 0 OID 0)
-- Dependencies: 232
-- Name: cbt_cleint_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_cleint_Urut_seq"', 4, true);


--
-- TOC entry 3212 (class 0 OID 0)
-- Dependencies: 199
-- Name: cbt_config_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_config_Urut_seq"', 1, true);


--
-- TOC entry 3213 (class 0 OID 0)
-- Dependencies: 201
-- Name: cbt_jawaban_Urutan_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_jawaban_Urutan_seq"', 2346, true);


--
-- TOC entry 3214 (class 0 OID 0)
-- Dependencies: 203
-- Name: cbt_kelas_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_kelas_Urut_seq"', 101, true);


--
-- TOC entry 3215 (class 0 OID 0)
-- Dependencies: 205
-- Name: cbt_mapel_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_mapel_Urut_seq"', 191, true);


--
-- TOC entry 3216 (class 0 OID 0)
-- Dependencies: 207
-- Name: cbt_nilai_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_nilai_Urut_seq"', 101, true);


--
-- TOC entry 3217 (class 0 OID 0)
-- Dependencies: 208
-- Name: cbt_paketmateri_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_paketmateri_Urut_seq"', 15, true);


--
-- TOC entry 3218 (class 0 OID 0)
-- Dependencies: 211
-- Name: cbt_paketsoal_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_paketsoal_Urut_seq"', 78, true);


--
-- TOC entry 3219 (class 0 OID 0)
-- Dependencies: 213
-- Name: cbt_pelajaran_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_pelajaran_Urut_seq"', 8, true);


--
-- TOC entry 3220 (class 0 OID 0)
-- Dependencies: 215
-- Name: cbt_pesan_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_pesan_Urut_seq"', 7, true);


--
-- TOC entry 3221 (class 0 OID 0)
-- Dependencies: 217
-- Name: cbt_siswa_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_siswa_Urut_seq"', 13946, true);


--
-- TOC entry 3222 (class 0 OID 0)
-- Dependencies: 218
-- Name: cbt_siswa_pelajaran_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_siswa_pelajaran_Urut_seq"', 6, true);


--
-- TOC entry 3223 (class 0 OID 0)
-- Dependencies: 221
-- Name: cbt_siswa_ujian_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_siswa_ujian_Urut_seq"', 112, true);


--
-- TOC entry 3224 (class 0 OID 0)
-- Dependencies: 223
-- Name: cbt_soal_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_soal_Urut_seq"', 1705, true);


--
-- TOC entry 3225 (class 0 OID 0)
-- Dependencies: 225
-- Name: cbt_tanya_pelajaran_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_tanya_pelajaran_Urut_seq"', 164, true);


--
-- TOC entry 3226 (class 0 OID 0)
-- Dependencies: 227
-- Name: cbt_tes_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_tes_Urut_seq"', 10, true);


--
-- TOC entry 3227 (class 0 OID 0)
-- Dependencies: 229
-- Name: cbt_ujian_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_ujian_Urut_seq"', 26, true);


--
-- TOC entry 3228 (class 0 OID 0)
-- Dependencies: 231
-- Name: cbt_user_Urut_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."cbt_user_Urut_seq"', 82, true);


--
-- TOC entry 2934 (class 2606 OID 34337)
-- Name: cbt_admin cbt_admin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_admin
    ADD CONSTRAINT cbt_admin_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2936 (class 2606 OID 34339)
-- Name: cbt_config cbt_config_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_config
    ADD CONSTRAINT cbt_config_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2942 (class 2606 OID 34341)
-- Name: cbt_jawaban cbt_jawaban_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_jawaban
    ADD CONSTRAINT cbt_jawaban_pkey PRIMARY KEY ("Urutan");


--
-- TOC entry 2946 (class 2606 OID 34343)
-- Name: cbt_kelas cbt_kelas_XNamaKelas_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_kelas
    ADD CONSTRAINT "cbt_kelas_XNamaKelas_key" UNIQUE ("XNamaKelas");


--
-- TOC entry 2948 (class 2606 OID 34345)
-- Name: cbt_kelas cbt_kelas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_kelas
    ADD CONSTRAINT cbt_kelas_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2950 (class 2606 OID 34347)
-- Name: cbt_mapel cbt_mapel_XKodeMapel; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_mapel
    ADD CONSTRAINT "cbt_mapel_XKodeMapel" UNIQUE ("XKodeMapel");


--
-- TOC entry 2952 (class 2606 OID 34349)
-- Name: cbt_mapel cbt_mapel_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_mapel
    ADD CONSTRAINT cbt_mapel_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2954 (class 2606 OID 34351)
-- Name: cbt_nilai cbt_nilai_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_nilai
    ADD CONSTRAINT cbt_nilai_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2957 (class 2606 OID 34353)
-- Name: cbt_paketmateri cbt_paketmapel_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_paketmateri
    ADD CONSTRAINT cbt_paketmapel_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2959 (class 2606 OID 34355)
-- Name: cbt_paketmateri cbt_paketmateri_XKodeMateri; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_paketmateri
    ADD CONSTRAINT "cbt_paketmateri_XKodeMateri" UNIQUE ("XKodeMateri");


--
-- TOC entry 2963 (class 2606 OID 34357)
-- Name: cbt_paketsoal cbt_paketsoal_XKodeSoal_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_paketsoal
    ADD CONSTRAINT "cbt_paketsoal_XKodeSoal_key" UNIQUE ("XKodeSoal");


--
-- TOC entry 2965 (class 2606 OID 34359)
-- Name: cbt_paketsoal cbt_paketsoal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_paketsoal
    ADD CONSTRAINT cbt_paketsoal_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2967 (class 2606 OID 34361)
-- Name: cbt_pelajaran cbt_pelajaran_Urut; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_pelajaran
    ADD CONSTRAINT "cbt_pelajaran_Urut" PRIMARY KEY ("Urut");


--
-- TOC entry 2969 (class 2606 OID 34363)
-- Name: cbt_pelajaran cbt_pelajaran_XTokenPelajaran; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_pelajaran
    ADD CONSTRAINT "cbt_pelajaran_XTokenPelajaran" UNIQUE ("XTokenPelajaran");


--
-- TOC entry 2972 (class 2606 OID 34365)
-- Name: cbt_pesan cbt_pesan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_pesan
    ADD CONSTRAINT cbt_pesan_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2976 (class 2606 OID 34367)
-- Name: cbt_siswa cbt_siswa_XNIK_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_siswa
    ADD CONSTRAINT "cbt_siswa_XNIK_key" UNIQUE ("XNIK");


--
-- TOC entry 2979 (class 2606 OID 34369)
-- Name: cbt_siswa cbt_siswa_XNomerUjian_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_siswa
    ADD CONSTRAINT "cbt_siswa_XNomerUjian_key" UNIQUE ("XNomerUjian");


--
-- TOC entry 2986 (class 2606 OID 34371)
-- Name: cbt_siswa_pelajaran cbt_siswa_pelajaran_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_siswa_pelajaran
    ADD CONSTRAINT cbt_siswa_pelajaran_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2981 (class 2606 OID 34373)
-- Name: cbt_siswa cbt_siswa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_siswa
    ADD CONSTRAINT cbt_siswa_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2991 (class 2606 OID 34375)
-- Name: cbt_siswa_ujian cbt_siswa_ujian_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_siswa_ujian
    ADD CONSTRAINT cbt_siswa_ujian_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2995 (class 2606 OID 34377)
-- Name: cbt_soal cbt_soal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_soal
    ADD CONSTRAINT cbt_soal_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2997 (class 2606 OID 34379)
-- Name: cbt_tes cbt_tes_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_tes
    ADD CONSTRAINT cbt_tes_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 3000 (class 2606 OID 34381)
-- Name: cbt_ujian cbt_ujian_XTokenUjian_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_ujian
    ADD CONSTRAINT "cbt_ujian_XTokenUjian_key" UNIQUE ("XTokenUjian");


--
-- TOC entry 3002 (class 2606 OID 34383)
-- Name: cbt_ujian cbt_ujian_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_ujian
    ADD CONSTRAINT cbt_ujian_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 3005 (class 2606 OID 34385)
-- Name: cbt_user cbt_user_Username; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_user
    ADD CONSTRAINT "cbt_user_Username" UNIQUE ("Username");


--
-- TOC entry 3007 (class 2606 OID 34387)
-- Name: cbt_user cbt_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_user
    ADD CONSTRAINT cbt_user_pkey PRIMARY KEY ("Urut");


--
-- TOC entry 2937 (class 1259 OID 34388)
-- Name: cbt_jawaban_XIdUjian; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_jawaban_XIdUjian" ON public.cbt_jawaban USING btree ("XIdUjian");


--
-- TOC entry 2938 (class 1259 OID 34389)
-- Name: cbt_jawaban_XNomerSoal; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_jawaban_XNomerSoal" ON public.cbt_jawaban USING btree ("XNomerSoal");


--
-- TOC entry 2939 (class 1259 OID 34390)
-- Name: cbt_jawaban_XNomerUjian; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_jawaban_XNomerUjian" ON public.cbt_jawaban USING btree ("XNomerUjian");


--
-- TOC entry 2940 (class 1259 OID 34391)
-- Name: cbt_jawaban_XTokenUjian; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_jawaban_XTokenUjian" ON public.cbt_jawaban USING btree ("XTokenUjian");


--
-- TOC entry 2943 (class 1259 OID 34392)
-- Name: cbt_kelas_XKodeJurusan; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_kelas_XKodeJurusan" ON public.cbt_kelas USING btree ("XKodeJurusan");


--
-- TOC entry 2944 (class 1259 OID 34393)
-- Name: cbt_kelas_XKodeKelas; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_kelas_XKodeKelas" ON public.cbt_kelas USING btree ("XKodeKelas");


--
-- TOC entry 2955 (class 1259 OID 34394)
-- Name: cbt_paketmapel_Urut; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_paketmapel_Urut" ON public.cbt_paketmateri USING btree ("Urut");


--
-- TOC entry 2960 (class 1259 OID 34395)
-- Name: cbt_paketsoal_Urut; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_paketsoal_Urut" ON public.cbt_paketsoal USING btree ("Urut");


--
-- TOC entry 2961 (class 1259 OID 34396)
-- Name: cbt_paketsoal_XGuru; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_paketsoal_XGuru" ON public.cbt_paketsoal USING btree ("XGuru");


--
-- TOC entry 2970 (class 1259 OID 34397)
-- Name: cbt_pesan_XGuru; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_pesan_XGuru" ON public.cbt_pesan USING btree ("XGuru");


--
-- TOC entry 2973 (class 1259 OID 34398)
-- Name: cbt_siswa_XKodeJurusan; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_siswa_XKodeJurusan" ON public.cbt_siswa USING btree ("XKodeJurusan");


--
-- TOC entry 2974 (class 1259 OID 34399)
-- Name: cbt_siswa_XKodeKelas; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_siswa_XKodeKelas" ON public.cbt_siswa USING btree ("XKodeKelas");


--
-- TOC entry 2977 (class 1259 OID 34400)
-- Name: cbt_siswa_XNamaKelas; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_siswa_XNamaKelas" ON public.cbt_siswa USING btree ("XNamaKelas");


--
-- TOC entry 2982 (class 1259 OID 34401)
-- Name: cbt_siswa_pelajaran_XNomerUjian; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_siswa_pelajaran_XNomerUjian" ON public.cbt_siswa_pelajaran USING btree ("XNomerUjian");


--
-- TOC entry 2983 (class 1259 OID 34402)
-- Name: cbt_siswa_pelajaran_XTokenPelajaran; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_siswa_pelajaran_XTokenPelajaran" ON public.cbt_siswa_pelajaran USING btree ("XTokenPelajaran");


--
-- TOC entry 2984 (class 1259 OID 34403)
-- Name: cbt_siswa_pelajaran_id_pelajaran; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cbt_siswa_pelajaran_id_pelajaran ON public.cbt_siswa_pelajaran USING btree ("XIdPelajaran");


--
-- TOC entry 2987 (class 1259 OID 34404)
-- Name: cbt_siswa_ujian_XNomerUjian; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_siswa_ujian_XNomerUjian" ON public.cbt_siswa_ujian USING btree ("XNomerUjian");


--
-- TOC entry 2988 (class 1259 OID 34405)
-- Name: cbt_siswa_ujian_XTokenUjian; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_siswa_ujian_XTokenUjian" ON public.cbt_siswa_ujian USING btree ("XTokenUjian");


--
-- TOC entry 2989 (class 1259 OID 34406)
-- Name: cbt_siswa_ujian_id_ujian; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cbt_siswa_ujian_id_ujian ON public.cbt_siswa_ujian USING btree ("XIdUjian");


--
-- TOC entry 2992 (class 1259 OID 34407)
-- Name: cbt_soal_XKodeSoal; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_soal_XKodeSoal" ON public.cbt_soal USING btree ("XKodeSoal");


--
-- TOC entry 2993 (class 1259 OID 34408)
-- Name: cbt_soal_XNomerSoal; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_soal_XNomerSoal" ON public.cbt_soal USING btree ("XNomerSoal");


--
-- TOC entry 2998 (class 1259 OID 34409)
-- Name: cbt_ujian_XKodeSoal; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX "cbt_ujian_XKodeSoal" ON public.cbt_ujian USING btree ("XKodeSoal");


--
-- TOC entry 3003 (class 1259 OID 34410)
-- Name: cbt_ujian_token; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cbt_ujian_token ON public.cbt_ujian USING btree ("XTokenUjian");


--
-- TOC entry 3008 (class 2606 OID 34411)
-- Name: cbt_jawaban cbt_jawaban_XIdUjian_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_jawaban
    ADD CONSTRAINT "cbt_jawaban_XIdUjian_fkey" FOREIGN KEY ("XIdUjian") REFERENCES public.cbt_ujian("Urut") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3009 (class 2606 OID 34416)
-- Name: cbt_jawaban cbt_jawaban_XNomerUjian_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_jawaban
    ADD CONSTRAINT "cbt_jawaban_XNomerUjian_fkey" FOREIGN KEY ("XNomerUjian") REFERENCES public.cbt_siswa("XNomerUjian") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3010 (class 2606 OID 34421)
-- Name: cbt_nilai cbt_nilai_XNomerUjian_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_nilai
    ADD CONSTRAINT "cbt_nilai_XNomerUjian_fkey" FOREIGN KEY ("XNomerUjian") REFERENCES public.cbt_siswa("XNomerUjian") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3011 (class 2606 OID 34426)
-- Name: cbt_paketsoal cbt_paketsoal_XGuru_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_paketsoal
    ADD CONSTRAINT "cbt_paketsoal_XGuru_fkey" FOREIGN KEY ("XGuru") REFERENCES public.cbt_user("Username") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3012 (class 2606 OID 34431)
-- Name: cbt_paketsoal cbt_paketsoal_XKodeMapel_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_paketsoal
    ADD CONSTRAINT "cbt_paketsoal_XKodeMapel_fkey" FOREIGN KEY ("XKodeMapel") REFERENCES public.cbt_mapel("XKodeMapel") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3013 (class 2606 OID 34436)
-- Name: cbt_pelajaran cbt_pelajaran_XKodeMateri_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_pelajaran
    ADD CONSTRAINT "cbt_pelajaran_XKodeMateri_fkey" FOREIGN KEY ("XKodeMateri") REFERENCES public.cbt_paketmateri("XKodeMateri") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3014 (class 2606 OID 34441)
-- Name: cbt_siswa cbt_siswa_XNamaKelas_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_siswa
    ADD CONSTRAINT "cbt_siswa_XNamaKelas_fkey" FOREIGN KEY ("XNamaKelas") REFERENCES public.cbt_kelas("XNamaKelas") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3015 (class 2606 OID 34446)
-- Name: cbt_siswa_pelajaran cbt_siswa_pelajaran_XIdPelajaran_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_siswa_pelajaran
    ADD CONSTRAINT "cbt_siswa_pelajaran_XIdPelajaran_fkey" FOREIGN KEY ("XIdPelajaran") REFERENCES public.cbt_pelajaran("Urut") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3016 (class 2606 OID 34451)
-- Name: cbt_siswa_pelajaran cbt_siswa_pelajaran_XNomerUjian_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_siswa_pelajaran
    ADD CONSTRAINT "cbt_siswa_pelajaran_XNomerUjian_fkey" FOREIGN KEY ("XNomerUjian") REFERENCES public.cbt_siswa("XNomerUjian") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3017 (class 2606 OID 34456)
-- Name: cbt_siswa_ujian cbt_siswa_ujian_XIdUjian_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_siswa_ujian
    ADD CONSTRAINT "cbt_siswa_ujian_XIdUjian_fkey" FOREIGN KEY ("XIdUjian") REFERENCES public.cbt_ujian("Urut") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3018 (class 2606 OID 34461)
-- Name: cbt_siswa_ujian cbt_siswa_ujian_XNomerUjian_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_siswa_ujian
    ADD CONSTRAINT "cbt_siswa_ujian_XNomerUjian_fkey" FOREIGN KEY ("XNomerUjian") REFERENCES public.cbt_siswa("XNomerUjian") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3019 (class 2606 OID 34466)
-- Name: cbt_soal cbt_soal_XKodeSoal_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_soal
    ADD CONSTRAINT "cbt_soal_XKodeSoal_fkey" FOREIGN KEY ("XKodeSoal") REFERENCES public.cbt_paketsoal("XKodeSoal") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3020 (class 2606 OID 34471)
-- Name: cbt_ujian cbt_ujian_XGuru_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_ujian
    ADD CONSTRAINT "cbt_ujian_XGuru_fkey" FOREIGN KEY ("XGuru") REFERENCES public.cbt_user("Username") ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3021 (class 2606 OID 34476)
-- Name: cbt_ujian cbt_ujian_XKodeSoal_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cbt_ujian
    ADD CONSTRAINT "cbt_ujian_XKodeSoal_fkey" FOREIGN KEY ("XKodeSoal") REFERENCES public.cbt_paketsoal("XKodeSoal") ON UPDATE CASCADE ON DELETE CASCADE;


-- Completed on 2019-05-17 15:51:09 UTC

--
-- PostgreSQL database dump complete
--

