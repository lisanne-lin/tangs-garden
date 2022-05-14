const confirmDelete = (e, id) => {
    e.preventDefault();
    const form = document.querySelector(`[data-form-id="${id}"]`);

    if (confirm("Are you sure")) {
        form.submit();
    }
}