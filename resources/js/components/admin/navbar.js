console.log('topbar loaded');

const BREAKPOINT = 1200;

const toggle =
    document.getElementById('topbarToggle');

const closeBtn =
    document.getElementById('sidebarClose');

const layout =
    document.querySelector('.admin-layout');

const sidebar =
    document.querySelector('.admin-sidebar');

const overlay =
    document.querySelector('.sidebar-overlay');

if (
    !toggle ||
    !layout ||
    !sidebar
) {
    console.warn(
        'Topbar elements not found'
    );

} else {

    const icon =
        toggle.querySelector('i');

    /*
     * Desktop state
     */
    if (
        window.innerWidth > BREAKPOINT &&
        localStorage.getItem(
            'sidebar-collapsed'
        ) === 'true'
    ) {
        layout.classList.add(
            'sidebar-collapsed'
        );
    }

    function openSidebar() {

        sidebar.classList.add(
            'show'
        );

        overlay?.classList.add(
            'show'
        );

        icon?.classList.remove(
            'fa-bars'
        );

        icon?.classList.add(
            'fa-xmark'
        );

    }

    function closeSidebar() {

        sidebar.classList.remove(
            'show'
        );

        overlay?.classList.remove(
            'show'
        );

        icon?.classList.remove(
            'fa-xmark'
        );

        icon?.classList.add(
            'fa-bars'
        );

    }

    toggle.addEventListener('click', () => {

        /*
         * Mobile
         */
        if (
            window.innerWidth <= BREAKPOINT
        ) {

            if (
                sidebar.classList.contains(
                    'show'
                )
            ) {
                closeSidebar();
            } else {
                openSidebar();
            }

            return;
        }

        /*
         * Desktop
         */
        layout.classList.toggle(
            'sidebar-collapsed'
        );

        localStorage.setItem(
            'sidebar-collapsed',
            layout.classList.contains(
                'sidebar-collapsed'
            )
        );

    });

    /*
     * Close button
     */
    closeBtn?.addEventListener(
        'click',
        closeSidebar
    );

    /*
     * Overlay click
     */
    overlay?.addEventListener(
        'click',
        closeSidebar
    );

    /*
     * Click outside
     */
    document.addEventListener(
        'click',
        e => {

            if (
                window.innerWidth > BREAKPOINT
            ) {
                return;
            }

            if (
                sidebar.contains(
                    e.target
                ) ||
                toggle.contains(
                    e.target
                )
            ) {
                return;
            }

            closeSidebar();

        }
    );

    /*
     * Resize
     */
    window.addEventListener(
        'resize',
        () => {

            if (
                window.innerWidth > BREAKPOINT
            ) {

                closeSidebar();

                if (
                    localStorage.getItem(
                        'sidebar-collapsed'
                    ) === 'true'
                ) {

                    layout.classList.add(
                        'sidebar-collapsed'
                    );

                }

            } else {

                layout.classList.remove(
                    'sidebar-collapsed'
                );

            }

        }
    );

}
