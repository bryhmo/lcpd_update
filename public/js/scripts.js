

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('form.toggle-admission').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            let button = this.querySelector('button');
            let formData = new FormData(this);
            let url = this.getAttribute('action');

            fetch(url, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    button.textContent = button.textContent === 'Admitted' ? 'Not Admitted' : 'Admitted';
                }
            });
        });
    });
});
