export function showDeleteModal() {
    // Prelevo il modale dal DOM
    const deleteModal = document.querySelector('.deleteAlert');
    
    // Controllo se il modale esiste
    if (!deleteModal) {
        console.warn('Modal .deleteAlert non trovato nel DOM');
        return;
    }

    // Prelevo i bottoni di conferma/annulla del modale
    const confirmBtn = deleteModal.querySelector('[data-action="confirm"]');
    const cancelBtn = deleteModal.querySelector('[data-action="cancel"]');
    
    let currentForm = null; // Form del gioco da eliminare

     // Funzione helper per chiudere il modale
    function closeModal() {
        deleteModal.classList.add('hidden');
        deleteModal.classList.remove('flex');
        currentForm = null;
    }

    // Aggiungo event listener a tutti i bottoni delete
    document.querySelectorAll('.deleteBtn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Salvo il form da submittare dopo la conferma
            currentForm = this.closest('form');
            
            // Mostro il modale
            deleteModal.classList.remove('hidden');
            deleteModal.classList.add('flex');
        });
    });

    // Bottone di conferma eliminazione
    if (confirmBtn) {
        confirmBtn.addEventListener('click', function() {
            if (currentForm) {
                currentForm.submit(); // Invia il form DELETE
            }
        });
    }

    // Bottone di annullamento
    if (cancelBtn) {
        cancelBtn.addEventListener('click', function() {
            closeModal();
        });
    }

    // Chiudi il modale cliccando fuori
    deleteModal.addEventListener('click', function(e) {
        if (e.target === deleteModal) {
            closeModal();
        }
    });

   
}