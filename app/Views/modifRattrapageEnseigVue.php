    <div class="justify-center">
        <h1 class="text-3xl font-extra my-6 ml-24">Modification du rattrapage</h1>

        <section class="mt-12 w-full h-full flex justify-center">
            <div class="w-8/12 h-full px-6 py-6 bg-violet-200 rounded-xl">
                <div class="flex h-full flex-wrap items-center justify-center">

                    <!-- Left column container with background-->
                    <div class="flex h-full flex-wrap items-center w-6/12">
                            <div class="ml-10">
                                <p><b>Nom</b> : <?php echo $rattrapage['nom'] ?> </p>
                                <p><b>Ressource</b> : <?php echo $rattrapage['ressource'] ?></p>
                                <p><b>Semestre</b> : <?php echo $rattrapage['semestre'] ?></p>
                                <p><b>Enseignant</b> : <?php 
                                        $string = trim($rattrapage['enseignant'], '{}');
                                        $array=explode(',',$string);
                                        foreach($array as $tmp)
                                            foreach($enseignants as $ense){
                                                if ($ense['id_utilisateur']==$tmp)
                                                    echo $ense['nom'];
                                                }
                                                            
                                    ?></p>
                                <p><b>Date de rattrapage</b> : <?php echo $rattrapage['dateRattrapage'] ?></p>
                                <p><b>Salle</b> : <?php if (empty($rattrapage['salle']) || $rattrapage['salle'] == null || $rattrapage['salle']== '')
                                            echo '-';
                                        else
                                            echo $rattrapage['salle']; ?> </p>
                                <p><b>Durée</b> : <?php echo $rattrapage['duree'] ?></p>
                                <p><b>Etat</b> : <?php echo $rattrapage['etat'] ?></p>
                            </div>
                            <div class="ml-10">
                                <p><b>Type</b> : 
                                    <?php echo $rattrapage['type'] ?></p>


                                <p><b>Date initiale</b> : <?php echo $rattrapage['dateDS'] ?></p>
                                
                                
                                <p><button class="my-2 w-auto inline-block text-white rounded bg-violet-500 px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal transition duration-150 ease-in-out hover:bg-violet-700"><b><a 
                                data-te-toggle="modal"
                                data-te-target="#etudiantsAbsentsJustifies"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                    Absents justifiés
                                </a></b></button><p>

                        <!-- Modal -->
                        <div
                                    data-te-modal-init
                                    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                    id="etudiantsAbsentsJustifies"
                                    tabindex="-1"
                                    aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                <div
                                        data-te-modal-dialog-ref
                                        class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                                    <div
                                            class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                                        <div
                                                class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                            <!--Modal title-->
                                            <h5
                                                    class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                    id="exampleModalLabel">
                                                Etudiants absents justifés
                                            </h5>
                                            <!--Close button-->
                                            <button
                                                    type="button"
                                                    class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                                    data-te-modal-dismiss
                                                    aria-label="Close">
                                                <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        fill="none"
                                                        viewBox="0 0 24 24"
                                                        stroke-width="1.5"
                                                        stroke="currentColor"
                                                        class="h-6 w-6">
                                                    <path
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                        <!--Modal body-->
                                        <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                            <!-- Tableau des étudiants absents justifés (nom, prénom, classe)-->
                                            <div class="flex justify-center items-center">
                                                <table>
                                                    <thead>
                                                    <tr>
                                                        <th class=" px-6 py-4">Nom</th>
                                                        <th class=" px-6 py-4">Prénom</th>
                                                        <th class=" px-6 py-4">Classe</th>
                                                    </tr>
                                                    </thead>
                                                        <tbody>

                                                        <?php
                                                            $etudiant = $rattrapage['etudiantsJustifie'];
                                                            $etudiant  = trim($etudiant,'{}');
                                                            $array=explode(',',$etudiant);
                                                            foreach($array as $idetudiant)
                                                                foreach($etudiants as $etu)
                                                                    if ($etu['id_etudiant']==$idetudiant){
                                                                        echo "<tr>";
                                                                        echo "<td>".$etu['nom']."</td>"; 
                                                                        echo "<td>".$etu['prenom']."</td>";        
                                                                        echo "<td>".$etu['classe']."</td>";        
                                                                        echo "</tr>";
                                                                    }                                                                                 
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p><button class="my-2 w-auto inline-block text-white rounded bg-violet-500 px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal transition duration-150 ease-in-out hover:bg-violet-700"><b><a data-te-toggle="modal"
                                data-te-target="#etudiantsAbsentsNonJustifies"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                Absents non justifiés
                            </a></b></button><p>


                            <!-- Modal -->
                            <div
                                data-te-modal-init
                                class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                id="etudiantsAbsentsNonJustifies"
                                tabindex="-1"
                                aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                            <div
                                    data-te-modal-dialog-ref
                                    class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                                <div
                                        class="min-[576px]:shadow-[0_0.5rem_1rem_rgba(#000, 0.15)] pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none dark:bg-neutral-600">
                                    <div
                                            class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4 dark:border-opacity-50">
                                        <!--Modal title-->
                                        <h5
                                                class="text-xl font-medium leading-normal text-neutral-800 dark:text-neutral-200"
                                                id="exampleModalLabel">
                                            Etudiants absents non justifés
                                        </h5>
                                        <!--Close button-->
                                        <button
                                                type="button"
                                                class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                                                data-te-modal-dismiss
                                                aria-label="Close">
                                            <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke-width="1.5"
                                                    stroke="currentColor"
                                                    class="h-6 w-6">
                                                <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>

                                    <!--Modal body-->
                                    <div class="relative flex-auto p-4" data-te-modal-body-ref>
                                        <!-- Tableau des étudiants absents non justifés (nom, prénom, classe)-->
                                        <div class="flex justify-center items-center">
                                        <table>
                                                <thead>
                                                <tr>
                                                    <th class=" px-6 py-4">Nom</th>
                                                    <th class=" px-6 py-4">Prénom</th>
                                                    <th class=" px-6 py-4">Classe</th>
                                                </tr>
                                                </thead>
                                                    <tbody>

                                                    <?php
                                                        $etudiant = $rattrapage['etudiantsNonJustifie'];
                                                        $etudiant  = trim($etudiant,'{}');
                                                        $array=explode(',',$etudiant);
                                                        foreach($array as $idetudiant)
                                                            foreach($etudiants as $etu)
                                                                if ($etu['id_etudiant']==$idetudiant){
                                                                    echo "<tr>";
                                                                    echo "<td>".$etu['nom']."</td>"; 
                                                                    echo "<td>".$etu['prenom']."</td>";        
                                                                    echo "<td>".$etu['classe']."</td>";        
                                                                    echo "</tr>";
                                                                }                                                                                 
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                                <p><b>Commentaire</b></p>
                                <p>
                                    <?php if (empty($rattrapage['commentaire']) || $rattrapage['commentaire'] == null || $rattrapage['commentaire']== '')
                                            echo '-';
                                        else
                                            echo $rattrapage['commentaire']; ?></p>
                            </div>
                        </div>

                    <!-- Right column container with form -->
                    <div class="w-6/12">
                        <form action="/rattrapages/updateEns" method="post">
                            <!-- Salle input -->
                            <div class="relative mb-3 bg-white rounded-lg" data-te-input-wrapper-init>
                                <input type="text"
                                    class="h-9 bg-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    id="salle" 
                                    name="salle"
                                    value="<?php echo $rattrapage['salle'] ?>"
                                    placeholder="Salle" 
                                    required />
                                <label for="Salle"
                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Salle
                                </label>
                            </div>

                            <!-- Date de rattrapage -->
                            <div class="relative mb-3" data-te-date-timepicker-init data-te-input-wrapper-init
                                data-te-disable-past="true">
                                <input type="text"
                                    id="dateRattrapage" 
                                    name="dateRattrapage" 
                                    value="<?php echo $rattrapage['dateRattrapage'] ?>"
                                    class="bg-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    required
                                    readonly />
                                <label for="dateRattrapage"
                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Sélectionner une date et une heure</label>
                            </div>

                            <!-- etat input -->
                            <div class="mb-3 h-9 bg-white rounded-lg">
                                    <select id="etat" name = "etat" class="" data-te-select-init required>
                                        <option <?php if ($rattrapage['etat'] == "En cours" ) echo " selected";?> value="En cours">En cours</option>
                                        <option <?php if ($rattrapage['etat'] == "Programmé" ) echo " selected";?> value="Programmé">Programmé</option>
                                        <option <?php if ($rattrapage['etat'] == "Neutralisé" ) echo " selected";?> value="Neutralisé">Neutralisé</option>
                                    </select>
                            </div>

                            <div class="relative mb-3" data-te-input-wrapper-init>
                                <textarea
                                    class="bg-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                    id="commentaire"
                                    name="commentaire" 
                                    rows="3" placeholder="Your message"><?php echo $rattrapage['commentaire'] ?></textarea>
                                <label for="exampleFormControlTextarea1"
                                    class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Commentaire</label>
                            </div>

                            <!-- Submit button -->
                            <input type="hidden" id = "id_rattrapage" name = "id_rattrapage" value="<?php echo $rattrapage['id_rattrapage'] ?> ">
                            <button type="submit"
                                class="text-white inline-block rounded bg-violet-600 px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-violet-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-violet-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-violet-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                data-te-ripple-init data-te-ripple-color="light">
                                Modifer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>