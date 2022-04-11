const confirmDelete = (id) => {
    const form = document.querySelector(`[data-form-id="${id}"]`);
    console.log(form);

    if (confirm("Are you sure")) {
        form.submit();
    }
}