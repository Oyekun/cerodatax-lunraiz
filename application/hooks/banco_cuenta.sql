--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.1
-- Dumped by pg_dump version 9.4.1
-- Started on 2018-10-25 22:05:33

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- TOC entry 2234 (class 0 OID 76307)
-- Dependencies: 225
-- Data for Name: nomenclador_tipobanco; Type: TABLE DATA; Schema: public; Owner: cerodatax
--

INSERT INTO nomenclador_tipobanco (id, nombre, date_created, date_updated, created_from_ip, updated_from_ip) VALUES ('35e9c05d-8af6-5162-9c7d-b3723d2830f3', 'Banco Central de Cuba', '2018-10-22 21:33:50', '2018-10-22 21:33:50', '::1', '::1');
INSERT INTO nomenclador_tipobanco (id, nombre, date_created, date_updated, created_from_ip, updated_from_ip) VALUES ('f67fabd3-7af7-5e39-9787-9cb18200ae0d', 'Bancos Comerciales', '2018-10-22 21:34:13', '2018-10-22 21:34:13', '::1', '::1');
INSERT INTO nomenclador_tipobanco (id, nombre, date_created, date_updated, created_from_ip, updated_from_ip) VALUES ('3c5ee190-9150-5d7a-81d7-9755983d4aca', 'Financieras no Bancarias', '2018-10-22 21:34:36', '2018-10-22 21:34:36', '::1', '::1');
INSERT INTO nomenclador_tipobanco (id, nombre, date_created, date_updated, created_from_ip, updated_from_ip) VALUES ('9dbabe44-20b3-54a2-9ae5-2de5d0f0484d', 'Bancos Extranjeros', '2018-10-22 21:34:56', '2018-10-22 21:34:56', '::1', '::1');
INSERT INTO nomenclador_tipobanco (id, nombre, date_created, date_updated, created_from_ip, updated_from_ip) VALUES ('c2487394-5052-502d-b0a0-f376da109ff3', 'Financieras Extranjeras', '2018-10-22 21:35:13', '2018-10-22 21:35:13', '::1', '::1');


--
-- TOC entry 2235 (class 0 OID 76314)
-- Dependencies: 226
-- Data for Name: nomenclador_banco; Type: TABLE DATA; Schema: public; Owner: cerodatax
--

INSERT INTO nomenclador_banco (id, nombre, foto, direccion, correo, telefono, fax, telex, swift_code, pais_id, provincia_id, municipio_id, tipo_banco_id, date_created, date_updated, created_from_ip, updated_from_ip, web, presidente) VALUES ('35e9c05d-8af6-5162-9c7d-b3723d2830f3', 'Banco Central de Cuba', NULL, 'Oficina Central/Head Office  Cuba 402 - Aguiar 411', NULL, '(537)860-4811 al 18', '(537)863-4061', NULL, NULL, 'e83c84eb-a2ee-507b-ad05-a86465dfc1e5', 'b957b8ad-0547-556c-b619-b93c382ad847', '3ac52b87-1733-5130-a7b0-1a40a4c08319', '35e9c05d-8af6-5162-9c7d-b3723d2830f3', '2018-10-22 22:24:31', '2018-10-22 22:31:50', '::1', '::1', 'www.bc.gob.cu', 'Irma Margarita Martínez Castrillón');
INSERT INTO nomenclador_banco (id, nombre, foto, direccion, correo, telefono, fax, telex, swift_code, pais_id, provincia_id, municipio_id, tipo_banco_id, date_created, date_updated, created_from_ip, updated_from_ip, web, presidente) VALUES ('da2bcf43-41a1-57c3-ba30-e36ff2fb0729', 'Banco de Crédito y Comercio', NULL, 'Amargura 158 esq. Cuba', NULL, '(537)861-4533 (537)863-5261', '(537)866-8968', NULL, NULL, 'e83c84eb-a2ee-507b-ad05-a86465dfc1e5', 'b957b8ad-0547-556c-b619-b93c382ad847', '3ac52b87-1733-5130-a7b0-1a40a4c08319', 'f67fabd3-7af7-5e39-9787-9cb18200ae0d', '2018-10-22 22:35:27', '2018-10-22 22:35:27', '::1', '::1', NULL, 'Ileana Estévez');
INSERT INTO nomenclador_banco (id, nombre, foto, direccion, correo, telefono, fax, telex, swift_code, pais_id, provincia_id, municipio_id, tipo_banco_id, date_created, date_updated, created_from_ip, updated_from_ip, web, presidente) VALUES ('0a7cfc53-a33f-5dac-8d65-43ba5920496c', 'Banco Nacional de Cuba ', NULL, 'Aguiar 456 e/ Amargura y Lamparilla', NULL, '(537)862-8896 (537)866-9512', '(537)866-9390', NULL, NULL, 'e83c84eb-a2ee-507b-ad05-a86465dfc1e5', 'b957b8ad-0547-556c-b619-b93c382ad847', '3ac52b87-1733-5130-a7b0-1a40a4c08319', 'f67fabd3-7af7-5e39-9787-9cb18200ae0d', '2018-10-22 22:33:49', '2018-10-25 03:39:45', '::1', '::1', NULL, 'René Lazo Fernández');


--
-- TOC entry 2236 (class 0 OID 76372)
-- Dependencies: 228
-- Data for Name: nomenclador_cuentabancaria; Type: TABLE DATA; Schema: public; Owner: cerodatax
--

INSERT INTO nomenclador_cuentabancaria (id, nombre, numero, banco_id, moneda_id, date_created, date_updated, created_from_ip, updated_from_ip, activo, descripcion) VALUES ('91138789-688d-5a95-8611-179e26c5815e', 'Leandro', '8879', '0a7cfc53-a33f-5dac-8d65-43ba5920496c', '7773c1d0-e5df-51ab-92dd-806469abf88c', '2018-10-23 15:54:37', '2018-10-23 15:54:37', '::1', '::1', 1, 'Es para mi retiro');


-- Completed on 2018-10-25 22:05:35

--
-- PostgreSQL database dump complete
--

