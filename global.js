window.addEventListener('DOMContentLoaded', () => {

    // let entryDataSection = document.getElementById('form-section');

    // // POPUP SHOW
    // let popupSection = document.getElementById('popup-section');

    // // popupSection.classList.add('show');
    // document.body.style.overflow = 'hidden';

    //   BUTTON NAVIGATE TO NEW SECTION
    let buttonNavNewSection = document.getElementById('tugas-2');
    buttonNavNewSection.addEventListener('click', () => {
        popupSection.classList.remove('show');
        document.body.style.overflow = 'visible';

        setTimeout(() => {
            entryDataSection.scrollIntoView();
        }, 500)

    })

    // CLOSE BUTTON POPUP
    let closeButtonPopup = document.querySelector('.close-btn-popup');
    closeButtonPopup.addEventListener('click', () => {
        popupSection.classList.remove('show');
        document.body.style.overflow = 'visible';
    })

    // CLOSE POPUP USE CLICK ANYWHERE
    popupSection.addEventListener('click', (e) => {
        if (e.target == popupSection || e.target == document.getElementById('popup-content-wr')) {
            popupSection.classList.remove('show');
            document.body.style.overflow = 'visible';
        }
    })


    // MENU CLICKED
    let headerMenus = document.querySelectorAll('#header-menu-wr ul li a');

    // MOBILE MENU
    let mobileMenuTrigger = document.querySelector('.hc-col3-col-2');
    let mobileMenu = document.getElementById('hc-col-2');
    let mobileMenuCloseTrigger = document.querySelector('.close-button-menu');



    if (window.innerWidth <= 600) {

        mobileMenuTrigger.addEventListener('click', () => {
            mobileMenu.classList.add('show');
            document.body.style.overflow = 'hidden';
        })

        mobileMenuCloseTrigger.addEventListener('click', () => {
            mobileMenu.classList.remove('show');
            document.body.style.overflow = 'visible';
        })


    }

    headerMenus.forEach(headerMenu => {
        headerMenu.addEventListener('click', (e) => {
            e.preventDefault();

            if (window.innerWidth <= 600) {
                mobileMenu.classList.remove('show');
                document.body.style.overflow = 'visible';
            }

            // AMBIL DATA BUTTON
            let dataButton = headerMenu.getAttribute('data-btn');

            switch (dataButton) {
                case 'about':

                    window.scrollTo(0, 0);

                    break;

                case 'project':

                    let projectSection = document.getElementById('myproject-section');

                    projectSection.scrollIntoView();

                    break;

                case 'contact':

                    let contactSection = document.getElementById('contact-section');

                    contactSection.scrollIntoView();

                    break;

                case 'entry-data':

                    entryDataSection.scrollIntoView();

                    break;
            }

        })
    })


});