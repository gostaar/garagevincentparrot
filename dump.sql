--
-- PostgreSQL database dump
--

-- Dumped from database version 15.3
-- Dumped by pg_dump version 15.3

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.admin (id, email, roles, password) FROM stdin;
\.


--
-- Data for Name: garage; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.garage (id, adresse, code_postal, ville, telephone, description, histoire) FROM stdin;
1	1 rue de la rue	10000	Bourges	01/01.01.01.01	"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."	"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
\.


--
-- Data for Name: contact; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.contact (id, nom, prenom, message, email, telephone, garage_id) FROM stdin;
1	Pretty	mary	"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."	mary@mary.com	01/01.01.01.01	\N
\.


--
-- Data for Name: doctrine_migration_versions; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.doctrine_migration_versions (version, executed_at, execution_time) FROM stdin;
DoctrineMigrations\\Version20230720151244	2023-07-20 17:12:53	244
DoctrineMigrations\\Version20230720155832	2023-07-20 17:58:56	27
DoctrineMigrations\\Version20230720163551	2023-07-20 18:35:54	40
DoctrineMigrations\\Version20230720182210	2023-07-20 20:22:35	44
DoctrineMigrations\\Version20230720203313	2023-07-20 22:33:30	4
\.


--
-- Data for Name: horaire; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.horaire (id, garage_id, jour, am, pm) FROM stdin;
1	1	a:6:{i:1;s:5:"lundi";i:2;s:5:"mardi";i:3;s:8:"mercredi";i:4;s:5:"jeudi";i:5;s:8:"vendredi";i:6;s:6:"samedi";}	a:6:{i:1;s:13:"09:00 - 12:00";i:2;s:13:"09:00 - 12:00";i:3;s:13:"09:00 - 12:00";i:4;s:13:"09:00 - 12:00";i:5;s:13:"09:00 - 12:00";i:6;s:13:"09:00 - 12:00";}	a:6:{i:1;s:13:"14:00 - 18:00";i:2;s:13:"14:00 - 18:00";i:3;s:13:"14:00 - 18:00";i:4;s:13:"14:00 - 18:00";i:5;s:13:"14:00 - 18:00";i:6;s:13:"14:00 - 18:00";}
\.


--
-- Data for Name: marque; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.marque (id, libelle) FROM stdin;
1	Ferrari
\.


--
-- Data for Name: messenger_messages; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.messenger_messages (id, body, headers, queue_name, created_at, available_at, delivered_at) FROM stdin;
\.


--
-- Data for Name: modele; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.modele (id, marque_id, libelle) FROM stdin;
1	\N	Roma
\.


--
-- Data for Name: service; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.service (id, garage_id, nom, description, photo, prix) FROM stdin;
1	1	carrosserie	"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."	\N	\N
\.


--
-- Data for Name: temoignage; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.temoignage (id, garage_id, nom, description, note, date_t) FROM stdin;
1	1	Aurelie	"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."	5	2023-07-20 17:58:00
\.


--
-- Data for Name: utilisateur; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.utilisateur (id, username, roles, password, nom, prenom, adresse) FROM stdin;
\.


--
-- Data for Name: voiture; Type: TABLE DATA; Schema: public; Owner: app
--

COPY public.voiture (id, modele_id, garage_id, titre, annee, km, image_principale, galerie_image, est_vendu, description, date_publication, caracteristique, equipements, prix) FROM stdin;
1	\N	\N	ferrari roma	2016	150000	image.jpg	a:1:{i:1;s:7:"car.jpg";}	f	"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."	2023-07-20 17:55:00	a:2:{i:1;s:12:"toit ouvrant";i:2;s:14:"peinture grise";}	a:2:{i:1;s:15:"sièges en cuir";i:2;s:13:"GPS intégré";}	20000
\.


--
-- Name: admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.admin_id_seq', 1, false);


--
-- Name: contact_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.contact_id_seq', 1, true);


--
-- Name: garage_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.garage_id_seq', 1, true);


--
-- Name: horaire_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.horaire_id_seq', 1, true);


--
-- Name: marque_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.marque_id_seq', 1, true);


--
-- Name: messenger_messages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.messenger_messages_id_seq', 1, false);


--
-- Name: modele_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.modele_id_seq', 1, true);


--
-- Name: service_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.service_id_seq', 1, true);


--
-- Name: temoignage_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.temoignage_id_seq', 1, true);


--
-- Name: utilisateur_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.utilisateur_id_seq', 1, false);


--
-- Name: voiture_id_seq; Type: SEQUENCE SET; Schema: public; Owner: app
--

SELECT pg_catalog.setval('public.voiture_id_seq', 1, true);


--
-- PostgreSQL database dump complete
--

