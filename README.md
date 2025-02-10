# Sistema di Gestione Biblioteca con Laravel

## Descrizione

Questo progetto è un'applicazione di gestione di una biblioteca sviluppata con Laravel. Il sistema permette la visualizzazione di libri, autori e prestiti attraverso l'uso di routes, template Blade e query SQL.

## Tecnologie Utilizzate

- **Laravel**: Framework PHP per lo sviluppo dell'applicazione.
- **MySQL**: Database relazionale utilizzato per la gestione dei dati.
- **Blade**: Template engine per la gestione delle viste.
- **Composer**: Gestore delle dipendenze di PHP.

## Struttura del Database

Il database è stato creato utilizzando MySQL Workbench ed è composto dalle seguenti tabelle:

1. **`authors`**: Gestisce gli autori dei libri.
   - id (INT, PK)
   - name (VARCHAR)

2. **`books`**: Gestisce i libri della biblioteca.
   - id (INT, PK)
   - title (VARCHAR)
   - author_id (INT, FK -> `authors.id`)
   - publication_year (YEAR)
   - availability_status (VARCHAR)

3. **`loans`**: Gestisce i prestiti dei libri.
   - id (INT, PK)
   - book_id (INT, FK -> `books.id`)
   - loan_date (DATE)
   - return_date (DATE, nullable)

Le tabelle sono state popolate con alcuni dati di esempio per testare le funzionalità dell'applicazione.

## Routes

Le seguenti routes sono state implementate in `routes/web.php`:

- **Homepage (`/`)**: La homepage del sistema.
- **Lista libri (`/books`)**: Visualizza la lista completa dei libri.
- **Dettaglio libro (`/books/{id}`)**: Visualizza i dettagli di un singolo libro.
- **Lista autori (`/authors`)**: Visualizza la lista degli autori.
- **Lista prestiti (`/loans`)**: Visualizza la lista dei prestiti.

## Template Blade

I seguenti template Blade sono stati creati:

- **`layouts/app.blade.php`**: Layout principale, utilizzato in tutte le pagine.
- **`pages/books/index.blade.php`**: Pagina che mostra la lista dei libri.
- **`pages/books/show.blade.php`**: Pagina che mostra i dettagli di un libro.

**Facoltativo**: La pagina di dettaglio del libro mostra anche le informazioni relative ai prestiti per quel libro.

## Funzionalità

1. **Visualizzazione Lista Libri**:
   - Titolo
   - Nome dell'autore
   - Anno di pubblicazione
   - Stato di disponibilità (se il libro è disponibile o prestato)
   - Link alla pagina di dettaglio del libro

2. **Pagina di Dettaglio del Libro**:
   - Titolo
   - Nome dell'autore
   - Anno di pubblicazione
   - Stato del prestito (se il libro è attualmente in prestito)

## Gestione dei Prestiti

La gestione dei prestiti è stata una parte più complessa del progetto. Inizialmente non ero sicuro di come gestire i prestiti, ma dopo aver fatto delle ricerche, ho deciso di implementare un form di registrazione dei prestiti. Il form permette di registrare un prestito, associando un libro a un prestito con una data di inizio e, opzionalmente, una data di restituzione.

### Form di Registrazione Prestiti:
Il form permette di:
- Selezionare un libro dalla lista.
- Inserire la data di inizio del prestito.
- (Facoltativo) Inserire una data di restituzione.

### Stato del Prestito:
Ogni libro nella lista dei libri e nella pagina di dettaglio ha un campo che indica lo stato del prestito (disponibile o in prestito), così che l'utente possa facilmente capire se il libro è attualmente disponibile o se è stato preso in prestito.

