
document.querySelectorAll('.btn').forEach(function(button) {
    button.addEventListener('click', function() {
        var file = this.getAttribute('data-file');
        // document.getElementById('fileImage').src = file;
        var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
        modal.show();
        console.log("info");
    });
});
