document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
            new bootstrap.Dropdown(toggle, {
                popperConfig: {
                    modifiers: [
                        {
                            name: 'offset',
                            options: {
                                offset: [0, 0] // desloca 2px para cima o dropdown
                            }
                        }
                    ]
                }
            });
        });