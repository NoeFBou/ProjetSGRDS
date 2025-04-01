<section class="flex justify-center items-center h-screen">
    <div class="bg-violet-200 rounded-xl p-10">
        <div class="flex items-center justify-center text-neutral-800 dark:text-neutral-200">

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

                <!-- Divider -->
                <div class="mx-12 mt-14 inline-block h-[250px] min-h-[1em] w-0.5 self-stretch bg-neutral-500 opacity-100 dark:opacity-50"></div>

                <!-- Right column container with form -->
                <div class="w-6/12">
                    <form action="/rattrapages/updateDir" method="post">
                        <div class="grid grid-cols-2 gap-4">
                            <div class=" h-9 rounded-lg">
                                <!-- Nom input -->
                                <div class="relative mb-3 rounded-lg" data-te-input-wrapper-init>
                                    <input type="text"
                                            id="nom"
                                            value = "<?php echo $rattrapage['nom'] ?>"
                                            name="nom" 
                                           class=" h-9 bg-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                           placeholder=""
                                           required />
                                    <label for="nom"
                                           class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Nom
                                    </label>
                                </div>
                            </div>
                            <div class=" h-9 rounded-lg">
                                <div class="bg-white rounded-lg">
                                    <!-- Semestre select -->
                                    <select name="semestre" id="semestre" class="" data-te-select-init required>
                                        <option  <?php if ($rattrapage['semestre'] == 1 ) echo " selected";?> value="1">1</option>
                                        <option  <?php if ($rattrapage['semestre'] == 2 ) echo " selected";?> value="2">2</option>
                                        <option  <?php if ($rattrapage['semestre'] == 3 ) echo " selected";?> value="3">3</option>
                                        <option  <?php if ($rattrapage['semestre'] == 4 ) echo " selected";?> value="4">4</option>
                                        <option  <?php if ($rattrapage['semestre'] == 5 ) echo " selected";?> value="5">5</option>
                                        <option  <?php if ($rattrapage['semestre'] == 6 ) echo " selected";?> value="6">6</option>
                                    </select>
                                    <label data-te-select-label-ref>Semestre</label>
                                </div>
                            </div>
                            <div class="...">
                                <!-- Date de rattrapage -->
                                <div
                                        class="relative mb-3"
                                        data-te-date-timepicker-init
                                        data-te-input-wrapper-init>
                                    <input
                                            type="text"
                                            id="dateDS"
                                            name="dateDS"
                                            value="<?php echo $rattrapage['dateDS']?>"
                                            class="bg-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                            placeholder="" 
                                            required
                                            readonly />
                                    <label
                                            for="dateDS"
                                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                    >Sélectionner une date</label>
                                </div>
                            </div>
                            <div class="h-9 rounded-lg">
                                <div class="bg-white rounded-lg">
                                    <!-- Enseignant select -->
                                    <select id="enseignant" name="enseignant" class="" data-te-select-init required>
                                        <?php foreach ($enseignants as $enseignant) : ?> 
                                            <option 
                                            <?php if ($rattrapage['enseignant'] == $enseignant['id_utilisateur'] ) 
                                                echo "selected"; ?>
                                                value="<?= $enseignant['id_utilisateur'] ?>"> 
                                                <?php echo $enseignant['nom'] ; ?>                                        
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label data-te-select-label-ref>Enseignant</label>
                                </div>
                            </div>
                            <div class="h-9 bg-white rounded-lg">
                                <!-- Ressource select -->
                                <select name="ressource" id="ressource" class="" data-te-select-init>
                                    <?php foreach ($ressources as $ressource) : ?>            
                                        <option 
                                        <?php if ($rattrapage['ressource'] == $ressource ) echo " selected";?>
                                        value="<?= $ressource['nom'] ?>"><?= $ressource['nom']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label data-te-select-label-ref>Ressource</label>
                            </div>
                            <div class="h-9 bg-white rounded-lg">
                                <!-- Type select -->
                                <select id="type" name = "type" class="" data-te-select-init required>
                                    <option <?php if ($rattrapage['type'] == "Devoir Surveillé" ) echo " selected";?> value="Devoir Surveillé">Devoir Surveillé</option>
                                    <option <?php if ($rattrapage['type'] == "Devoir Machine" ) echo " selected";?> value="Devoir Machine">Devoir Machine</option>
                                    <option <?php if ($rattrapage['type'] == "Devoir en classe" ) echo " selected";?> value="Devoir en classe">Devoir en classe</option>
                                </select>
                                <label data-te-select-label-ref>Type</label>
                            </div>
                            <div class="h-9 bg-white rounded-lg">
                                <select id="etudiantsJustifie" name="etudiantsJustifie[]" class="" data-te-select-init multiple data-te-select-filter="true">
                                <?php foreach ($etudiants as $etudiant) : ?>
                                    <option 
                                    <?php 
                                    $string = trim($rattrapage['etudiantsJustifie'], '{}');
                                    $array=explode(',',$string);
                                    foreach($array as $tmp)
                                        if ($etudiant['id_etudiant']==$tmp)
                                            echo "selected";                      
                                    ?>  
                                    value="<?= $etudiant['id_etudiant'] ?>"><?= $etudiant['nom']; $etudiant['nom']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <label data-te-select-label-ref>Elèves justifiés</label>
                            </div>

                            <div class="h-9 bg-white rounded-lg">
                                <select id="etudiantsNonJustifie" name="etudiantsNonJustifie[]" class="" data-te-select-init multiple data-te-select-filter="true">
                                <?php foreach ($etudiants as $etudiant) : ?>
                                    <option 
                                    <?php 
                                    $string = trim($rattrapage['etudiantsNonJustifie'], '{}');
                                    $array=explode(',',$string);
                                    foreach($array as $tmp)
                                        if ($etudiant['id_etudiant']==$tmp)
                                            echo "selected";                      
                                    ?>  
                                    
                                    value="<?= $etudiant['id_etudiant'] ?>">
                                    <?= $etudiant['nom']; $etudiant['nom']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <label data-te-select-label-ref>Elèves non justifiés</label>
                            </div>

                            <div class=" h-9 rounded-lg">
                                <!-- Nom input -->
                                <div class="relative mb-3 rounded-lg" data-te-input-wrapper-init>
                                    <input type="text"
                                            id="duree"
                                            value = "<?php echo $rattrapage['duree'] ?>"
                                            name="duree" 
                                           class=" h-9 bg-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                           placeholder=""
                                           required />
                                    <label for="FormInputNom"
                                           class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Durée
                                    </label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id = "id_rattrapage" name = "id_rattrapage" value="<?php echo $rattrapage['id_rattrapage'] ?> ">
                        <div class="mt-6 flex h-full flex-wrap items-center">
                            <!-- Submit button -->
                            <button type="submit"
                                    class="text-white inline-block rounded bg-violet-600 px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal transition duration-150 ease-in-out hover:bg-violet-700"
                                    data-te-ripple-init data-te-ripple-color="light">
                                Modifer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>