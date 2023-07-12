class Footer extends HTMLElement {
    constructor() {
      super();
    }
  
    connectedCallback() {
      this.innerHTML = `
      <footer class="bg-color-black">
        <div class="container flex-container vertical-align footer-size">
            <div class="flex-col h-trois-quart">
                <div class="logo-size">
                    <img src="./ressources/img/Logo-logma.png">
                </div>
                <div>
                    <h3 class="color-white ">Nous serions ravis de vous entendre.</h3>
                    <p class="color-main">N'hésitez pas à nous contacter si vous souhaitez collaborer avec nous ou
                        simplement discuter.</p>
                </div>

                <a href="mailto:contact@logma-production" class="container-contact color-white">
                    <h5>contact@logma-production </h5>
                    <h5 class="container-contact-icon"> →</h5>
                </a>
            </div>

            <div class="flex-container col-center h-demi">
                <h5 class="color-white ">Suivez nous</h5>
                <div class="flex-container col-center h-demi">
                    <div class="flex-col h-full">
                        <div class="icons-footer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" class="vertical-align"
                                viewBox="-2 -2 24 24">
                                <g>
                                    <path
                                        d="M15 11.13v3.697h-2.143v-3.45c0-.866-.31-1.457-1.086-1.457c-.592 0-.945.398-1.1.784c-.056.138-.071.33-.071.522v3.601H8.456s.029-5.842 0-6.447H10.6v.913l-.014.021h.014v-.02c.285-.44.793-1.066 1.932-1.066c1.41 0 2.468.922 2.468 2.902zM6.213 5.271C5.48 5.271 5 5.753 5 6.385c0 .62.466 1.115 1.185 1.115h.014c.748 0 1.213-.496 1.213-1.115c-.014-.632-.465-1.114-1.199-1.114zm-1.086 9.556h2.144V8.38H5.127v6.447z" />
                                    <path
                                        d="M4 2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H4zm0-2h12a4 4 0 0 1 4 4v12a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4a4 4 0 0 1 4-4z" />
                                </g>
                            </svg>
                        </div>
                        <div class="icons-footer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" class="vertical-align"
                                viewBox="0 0 24 24">
                                <g>
                                    <path d="M12 4c.855 0 1.732.022 2.582.058l1.004.048l.961.057l.9.061l.822.064a3.802 3.802 0 0 1 3.494 3.423l.04.425l.075.91c.07.943.122 1.971.122 2.954c0 .983-.052 2.011-.122 2.954l-.075.91c-.013.146-.026.287-.04.425a3.802 3.802 0 0 1-3.495 3.423l-.82.063l-.9.062l-.962.057l-1.004.048A61.59 61.59 0 0 1 12 20a61.59 61.59 0 0 1-2.582-.058l-1.004-.048l-.961-.057l-.9-.062l-.822-.063a3.802 3.802 0 0 1-3.494-3.423l-.04-.425l-.075-.91A40.662 40.662 0 0 1 2 12c0-.983.052-2.011.122-2.954l.075-.91c.013-.146.026-.287.04-.425A3.802 3.802 0 0 1 5.73 4.288l.821-.064l.9-.061l.962-.057l1.004-.048A61.676 61.676 0 0 1 12 4Zm0 2c-.825 0-1.674.022-2.5.056l-.978.047l-.939.055l-.882.06l-.808.063a1.802 1.802 0 0 0-1.666 1.623C4.11 9.113 4 10.618 4 12c0 1.382.11 2.887.227 4.096c.085.872.777 1.55 1.666 1.623l.808.062l.882.06l.939.056l.978.047c.826.034 1.675.056 2.5.056s1.674-.022 2.5-.056l.978-.047l.939-.055l.882-.06l.808-.063a1.802 1.802 0 0 0 1.666-1.623C19.89 14.887 20 13.382 20 12c0-1.382-.11-2.887-.227-4.096a1.802 1.802 0 0 0-1.666-1.623l-.808-.062l-.882-.06l-.939-.056l-.978-.047A60.693 60.693 0 0 0 12 6Zm-2 3.575a.6.6 0 0 1 .819-.559l.081.04l4.2 2.424a.6.6 0 0 1 .085.98l-.085.06l-4.2 2.425a.6.6 0 0 1-.894-.43l-.006-.09v-4.85Z" />
                                </g>
                            </svg>
                        </div>
                        <div class="icons-footer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" class="vertical-align"
                                viewBox="0 0 24 24">
                                <path
                                    d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8A1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5a5 5 0 0 1-5 5a5 5 0 0 1-5-5a5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-container col-center h-demi">
                <h5 class="color-white ">Notre contenu</h5>
                <div class="flex-container col-center h-demi">
                    <div class="flex-col h-full ">
                        <div>
                            <a href="./contacts.php">Contact</a>
                        </div>
                        <div>
                            <a href="./pages/cgu.html">CGU</a>
                        </div>
                        <div>
                            <a href="./pages/mentions-legales.html">Mentions légales</a>  
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="object-center flex-col">
            <p class="color-main text-center">© Logma production - 2023 Tous droits reservés<br></p>
            <div class="object-center vertical-align bottom-footer">
                <p class="color-main">Site Web éco conçue réalisé par </p>
                <a href="https://github.com/UnMugViolet" class="color-main"> paul. </a>
            </div>
        </div>
    </footer>
      `;
    }
  }
  
  customElements.define('footer-component', Footer);

