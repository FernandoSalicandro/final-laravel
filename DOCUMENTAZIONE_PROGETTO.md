#  GameVerse Backoffice

## Panoramica del Progetto

**GameVerse Backoffice** CMS per store videogame, sviluppato con **Laravel 11** e **Tailwind CSS**. L'applicazione offre un'interfaccia amministrativa moderna e intuitiva per la gestione di un catalogo videogiochi, con funzionalità CRUD complete, sistema di autenticazione e API REST per l'integrazione con applicazioni frontend.

---

##  Tecnologie Utilizzate

### Backend
- **PHP 8.2+** 
- **Laravel 11**
- **Laravel Breeze**
- **mySql** 

### Frontend
- **Blade** 
- **Tailwind CSS 3.4**

### Strumenti di Sviluppo
- **Composer** - Dependency manager PHP
- **NPM** - Package manager JavaScript
- **Laravel Pint** - Code style fixer
- **PHPUnit** - Testing framework

---

##  Struttura del Database

### Tabelle Principali

#### 1. **games** (Giochi)
```
- id (PK)
- title (string) - Titolo del gioco
- description (text) - Descrizione dettagliata
- image_url (string) - Path dell'immagine
- genre_id (FK) - Riferimento al genere
- timestamps
```

#### 2. **genres** (Generi)
```
- id (PK)
- name (string) - Nome del genere
- color (string, 7) - Colore esadecimale per UI
- timestamps
```

#### 3. **consoles** (Console)
```
- id (PK)
- name (string) - Nome della console
- timestamps
```

#### 4. **console_game** (Tabella Pivot)
```
- id (PK)
- game_id (FK)
- console_id (FK)
- timestamps
```

### Relazioni del Database

- **Game → Genre**: Many-to-One (Un gioco appartiene a un genere)
- **Game ↔ Console**: Many-to-Many (Un gioco può essere su più console)
- **Genre → Games**: One-to-Many (Un genere ha molti giochi)

---

## Funzionalità Principali

### 1. **Sistema di Autenticazione**

#### Login e Registrazione
- Sistema  di autenticazione implementato con **Laravel Breeze**
- Pagina di login personalizzata con branding GameVerse
- Registrazione nuovi utenti
- Password reset e email verification
- Protezione delle route tramite middleware `auth`

#### Gestione Utenti
- Profilo utente modificabile
- Cambio password
- Eliminazione account

### 2. **Gestione Videogiochi (CRUD Completo)**

#### Index - Lista Giochi
- Visualizzazione paginata di tutti i giochi (20 per pagina)
- Tabella ordinata alfabeticamente per titolo
- Contatore totale giochi
- Anteprima descrizione (limitata a 30 caratteri)
- Azioni rapide: Visualizza, Elimina

#### Create - Creazione Gioco
- Form validato per nuovo gioco
- Campi:
  - Titolo (required)
  - Descrizione (optional)
  - Genere (required, dropdown)
  - Console (optional, multiple select)
  - Immagine (optional, upload)
- Upload immagini con storage in `storage/app/games`

#### Show - Dettaglio Gioco
- Visualizzazione completa informazioni
- Immagine di copertina
- Genere con badge colorato
- Lista console associate
- Pulsanti per Edit e Delete

#### Edit - Modifica Gioco
- Form precompilato con dati esistenti
- Modifica tutti i campi
- Sostituzione immagine (elimina la precedente)
- Aggiornamento relazioni console
- Validazione identica a create

#### Delete - Eliminazione Gioco
- Modal di conferma per sicurezza
- Eliminazione fisica del gioco
- Rimozione immagine dallo storage
- Pulizia relazioni nella tabella pivot
- Messaggio di successo con redirect

### 3. **API REST**

API pubbliche per integrazioni frontend:

#### Endpoints Disponibili

**GET /api/games**
```json
{
  "success": true,
  "games": [
    {
      "id": 1,
      "title": "Far Cry III",
      "description": "Sparatutto in prima persona...",
      "image_url": "games/farcry3.jpg",
      "genre_id": 6,
      "genre": {
        "id": 6,
        "name": "Action",
        "color": "#ff0000"
      }
    }
  ]
}
```

**GET /api/games/{id}**
```json
{
  "success": true,
  "currentGame": {
    "id": 1,
    "title": "Far Cry III",
    "description": "...",
    "image_url": "games/farcry3.jpg",
    "genre": {...},
    "consoles": [
      {"id": 1, "name": "PlayStation 4"},
      {"id": 2, "name": "Xbox One"}
    ]
  }
}
```

### 4. **Gestione File**

#### Storage System
- Storage symlink
- Eliminazione automatica immagini quando si elimina un gioco
- Sostituzione immagine durante update

### 5. **User Interface**

#### Layout Responsive
- **Sidebar** navigazione principale
- **Header** con user dropdown (logout, profile)
- **Main content area** con contenuti dinamici
- Design  con Tailwind CSS


#### Componenti Riutilizzabili
- `delete-button` - Pulsante elimina con conferma
- `showBtn` - Link visualizzazione dettaglio
- `delete-alert` - Modal conferma eliminazione
- `sidelink` - Link sidebar con active state

#### Messaggi Flash
- Notifiche di successo dopo operazioni CRUD
- Styling con Tailwind (verde per successo)


---

##  Sicurezza

### Implementazioni di Sicurezza

1. **Autenticazione Obbligatoria**
   - Tutte le route CRUD protette con middleware `auth`
   - Redirect automatico al login per utenti non autenticati

2. **CSRF Protection**
   - Token CSRF in tutti i form

3. **Validazione Input**
   - Validazione server-side per tutti i form
   - Sanitizzazione automatica input

4. **SQL Injection Prevention**
   - Eloquent ORM con prepared statements
   - Protezione automatica contro SQL injection


---



##  Best Practices Implementate

### Laravel Best Practices

1. **Eloquent ORM** invece di query raw SQL
2. **Resource Controllers** per CRUD standardizzato
3. **Form Request Validation** per validazione centralizzata
4. **Blade Components** per riutilizzo codice
6. **Route Model Binding** per codice più pulito
7. **Mass Assignment Protection** per sicurezza
8. **Migrations e Seeders** per versionamento database

### Frontend Best Practices

1. ✅ **Component-Based Architecture** con Blade Components
2. ✅ **Responsive Design** mobile-first
3. ✅ **Asset Bundling** con Vite

---

