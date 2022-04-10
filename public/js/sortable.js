var el = document.getElementById('items');
Sortable.create(el);

Sortable.create(el, {
    group: 'el',
    animation: 100
  });