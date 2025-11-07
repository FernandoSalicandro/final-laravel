import './bootstrap';

import Alpine from 'alpinejs';
//importo il modale che ho creato per il delete dei giochi
import { showDeleteModal } from './Utils/showDeleteModal';

window.Alpine = Alpine;

Alpine.start();

// Inizializzo il modale di delete quando il DOM è pronto
document.addEventListener('DOMContentLoaded', function() {
    showDeleteModal();
});
