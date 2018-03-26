<!-- Square card -->
<style>
    /*.demo-card-square.mdl-card {*/
        /*width: 50vh;*/
        /*height: 50vh;*/
    /*}*/
    .mdl-grid {
        justify-content: center;
    }
    .mdl-cell {
        display: flex;
        justify-content: center;
    }
    .mdl-card {
        width: 40em;
        height: 30em;
    }
    .mdl-button {
        line-height: 3.8vh;
    }
    .demo-card-square > .mdl-card__title {
        color: #fff;
        background:
            url('../assets/demos/dog.png') bottom right 15% no-repeat #46B6AC;
    }
</style>

<div class="mdl-typography--text-center">
    <h2>Sublimez-vous.</h2>
    <h4>Avec la plate-forme Le Bon Skill, partagez vos connaissances en informatique avec vos camarades de l'EPSI.</h4>

    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--6-col">
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text">Apprendre</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    A l'aide d'un étudiant "Super Héros", comblez vos lacunes ou formez-vous à de nouvelles compétences informatiques ou généralistes.
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Découvrir les "Super Héros"
                    </a>
                </div>
            </div>
        </div>
        <div class="mdl-cell mdl-cell--6-col">
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text">Enseigner</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    Fort de votre savoir-faire, mettez à disposition vos compétences dans des échanges en 1-to-1 ou 1-to-many.
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Compléter mon profil de "Super Héros"
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>