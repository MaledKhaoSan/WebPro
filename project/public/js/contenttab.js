var tabs = document.querySelectorAll('.content_tab');
var h6 = document.querySelectorAll('.content_tab h6');
var tabContents = document.querySelectorAll('.tab_content');

tabs.forEach(tab => {
    tab.addEventListener('click', function() {
        const target = this.getAttribute('data-content');
        tabs.forEach(t => t.classList.remove('active'));
        this.classList.add('active');

        // make this h6 active
        h6.forEach(h => h.classList.remove('activetext'));
        this.querySelector('h6').classList.add('activetext');

        tabContents.forEach(content => content.classList.remove('activecontent'));
        document.querySelector(`.tab_content[name="${target}"]`).classList.add('activecontent');

    });
});



console.log("JS for content-tab loaded successfully");

