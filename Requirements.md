# Ultra-Test

## Dezvoltare Aplicație Web cu Laravel și Scheduler CLI

### Descriere: 

Doriți să dezvoltați o mică aplicație web care să permită utilizatorilor să creeze, să vizualizeze, să editeze și să șteargă articole. Aplicația trebuie să aibă un API REST pentru manipularea articolelor și să utilizeze o bază de date MySQL/ PostgreSQL pentru a stoca datele. De asemenea, trebuie să implementați un CLI pentru gestionarea unui scheduler care să schimbe periodic statutul articolelor.

### Cerințe:

Autentificare utilizator: 
  - Utilizatorii trebuie să poată să se înregistreze și să se autentifice în aplicație. Autentificarea trebuie să fie realizată folosind Laravel Passport sau altă metodă de autentificare JWT.

Operări CRUD cu articole:
  - Creare: Utilizatorii autentificați trebuie să poată să creeze articole noi.
  - Listare: Toți utilizatorii, inclusiv cei neautentificați, trebuie să poată să vadă lista articolelor.
  - Vizualizare: Utilizatorii trebuie să poată să vadă detaliile unui articol.
  - Editare: Utilizatorii autentificați trebuie să poată să editeze articolele pe care le-au creat.
  - Ștergere: Utilizatorii autentificați trebuie să poată să șteargă articolele pe care le-au creat.

API REST:
  - Implementați un API REST pentru manipularea articolelor (GET, POST, PUT, DELETE).
  - Asigurați-vă că API-ul este securizat și restricționează accesul la operațiile relevante doar pentru utilizatorii autentificați.

Bază de date:
  - Definiți schema bazei de date necesară pentru a stoca informațiile despre utilizatori și articole.
  - Folosiți migrări pentru a crea și a actualiza schema bazei de date.
  - Folosiți modele Eloquent pentru a interacționa cu baza de date.

Scheduler CLI:
  - Implementați un CLI pentru a gestiona un scheduler care să schimbe periodic statutul articolelor.
  - Schedulerul trebuie să ruleze o comandă periodică care să actualizeze statutul articolelor în funcție de anumite criterii. De exemplu, să schimbe statutul articolelor vechi în "învechit

Documentație:
  - Scrieți o scurtă documentație care să descrie cum să instalați și să rulați aplicația.
  - Includeți informații despre cum să utilizați API-ul, despre schemele de date și despre gestionarea schedulerului CLI.

### Note:

Durata testului: Aproximativ 3-5 ore.

Livrabil: Trimiteți codul sursă al aplicației împreună cu instrucțiunile de instalare și documentația.

Evaluare: Se va evalua calitatea codului, respectarea standardelor Laravel, abilitățile de OOP, implementarea API-ului REST, gestionarea bazei de date și implementarea schedulerului CLI.
