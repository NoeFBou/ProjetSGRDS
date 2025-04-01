<?php 

$isdir = FALSE;
if(session()->get('isDirecteur') == "t"){
    $isdir = TRUE;
}

if ($isdir == TRUE) : ?>

<section class="flex justify-center" style="padding : 50px">
<div class="bg-violet-200 rounded-xl p-10" style="width : 100%">
    <div class="items-center justify-center text-neutral-800 dark:text-neutral-200">
        <div class="rounded-lg bg-white shadow-lg dark:bg-neutral-800">

            <div class="px-4 md:px-0">
            <div class="md:mx-6 md:p-12">
                <h1 class="text-2xl">Ajouter un rattrapage</h1>
                <div class="block rounded-lg bg-white p-6 dark:bg-neutral-700">
                    <form action="/rattrapages" method="post">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="...">
                                <!-- Nom input -->
                                <div class="relative mb-3 h-9 bg-white rounded-lg" data-te-input-wrapper-init>
                                    <input type="text"
                                        class="bg-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                        id="nom"
                                        name="nom" 
                                        placeholder="Nom" required />
                                    <label for="nom"
                                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Nom
                                    </label>
                                </div>
                            </div>
                            <div class="h-9 bg-white rounded-lg">
                                <!-- Semestre select -->
                                <select onchange="ressource_by_semester()" name="semestre" class="" id="semestre" class="" data-te-select-init required >
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                                <label data-te-select-label-ref>Semestre</label>
                            </div>
                            <div class="...">
                                <!-- Date du DS -->
                                <div
                                        class="relative mb-3"
                                        data-te-date-timepicker-init
                                        data-te-timepicker-format24="true"
                                        data-te-input-wrapper-init>
                                    <input
                                            type="text"
                                            id="dateDS"
                                            name="dateDS"
                                            class="bg-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                            placeholder="Select a date"
                                            required
                                            readonly />
                                    <label
                                            for="floatingInput"
                                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary"
                                    >Sélectionner une date et une heure</label>
                                </div>
                            </div>

                                <!-- Duree DS input -->
                            <div class="relative mb-3 h-9 bg-white rounded-lg" data-te-input-wrapper-init>
                                        <input type="text"
                                            class="bg-white peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[2.15] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                            id="duree"
                                            name="duree" 
                                            placeholder="Durée du DS"
                                            required />
                                        <label for="duree"
                                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[1.15rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[1.15rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">Durée du DS
                                        </label>
                                    </div>

                            <div class="h-9 bg-white rounded-lg">
                                <!-- Enseignant select -->
                                <select id="enseignant" name="enseignant" class="" data-te-select-init required>
                                <?php foreach ($enseignants as $enseignant) : ?> 
                                    <option value="<?= $enseignant['id_utilisateur'] ?>"><?= $enseignant['nom']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <label data-te-select-label-ref>Enseignant</label>
                            </div>
                            <div class="h-9 bg-white rounded-lg">
                                <!-- Ressource select -->
                                <select name="ressource" id="ressource" class="" data-te-select-init required>
                                <?php foreach ($ressources as $ressource) : ?>            
                                    <option value="<?= $ressource['nom'] ?>"><?= $ressource['nom']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <label data-te-select-label-ref>Ressource</label>
                            </div>
                            <div class="h-9 bg-white rounded-lg">
                                <!-- Type select -->
                                <select id="type" name = "type" class="" data-te-select-init required>
                                    <option value=""></option>
                                    <option value="Devoir Surveillé">Devoir Surveillé</option>
                                    <option value="Devoir Machine">Devoir Machine</option>
                                    <option value="Devoir en classe">Devoir en classe</option>
                                </select>
                                <label data-te-select-label-ref>Type</label>
                            </div>
                            <div class="h-9 bg-white rounded-lg">
                                <select id="etudiantsJustifie" name="etudiantsJustifie[]" class="" data-te-select-init multiple data-te-select-filter="true">
                                <?php foreach ($etudiants as $etudiant) : ?>
                                    <option value="<?= $etudiant['id_etudiant'] ?>"><?= $etudiant['prenom']; ?>  <?= $etudiant['nom']; ?> <?= $etudiant['classe']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <label data-te-select-label-ref>Elèves justifiés</label>
                            </div>

                            <div class="h-9 bg-white rounded-lg">
                                <select id="etudiantsNonJustifie" name="etudiantsNonJustifie[]" class="" data-te-select-init multiple data-te-select-filter="true">
                                <?php foreach ($etudiants as $etudiant) : ?>
                                    <option value="<?= $etudiant['id_etudiant'] ?>"><?= $etudiant['prenom']; ?>  <?= $etudiant['nom']; ?> <?= $etudiant['classe']; ?></option>
                                <?php endforeach; ?>
                                </select>
                                <label data-te-select-label-ref>Elèves non justifiés</label>
                            </div>
                            
                            
                
                            </div>

                        

                        <div class="mt-6 flex h-full flex-wrap items-center">
                            <!-- Submit button -->
                            <button type="submit"
                                    class="inline-block rounded bg-violet-600 px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-violet-700 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-violet-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-violet-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                    data-te-ripple-init data-te-ripple-color="light">
                                Créer
                            </button>
                        </div>
                    </form>
        </div>


            </div>
                </div>
                </div>
            <?php endif; ?> 
            <!--<div class="mt-8 rounded-lg bg-violet-200 shadow-lg dark:bg-neutral-800 items-center">-->
            <section class="bg-violet-200 rounded-xl p-10">
            
            <h1 class="text-3xl font-extra my-6 ml-24">Liste des rattrapages</h1>
            <?php if (!empty($rattrapages)) : ?>
            <button id="dropdownSemestre" data-dropdown-toggle="dropdown"
                class="mb-5 text-white bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                type="button" onclick="open_filter_semester()">
                Filter par semestre
                <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <button id="dropdownRessource" data-dropdown-toggle="dropdown"
                class="mb-5 mr-4 text-white bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                type="button" onclick="open_filter_ressource()">
                Filter par ressource
                <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Dropdown menu Filtrer Semestre -->
            <div id="filter_semester" class="mb-5 z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                Semestre
                </h6>
                <ul class="space-y-2 text-sm" aria-labelledby="dropdownSemestre">
                <?php
                    for($s =1;$s<=6;$s++){
                        echo "<li class=\"flex items-center\">
                        <input id=\"semestre ". $s . "\" type=\"checkbox\" value=\"" . $s ."\"
                        class=\"w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500\" />
    
                        <label for=\"semestre1\" class=\"ml-2 text-sm font-medium text-gray-900 dark:text-gray-100\">
                        Semestre ". $s."</label></li>";
                    }
                ?>
                </ul>
            </div>
            <!-- Dropdown menu Filtrer Ressource -->
            <div id="filter_ressource" class="mb-5 z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                Ressources
                </h6>
                <ul class="space-y-2 text-sm" aria-labelledby="dropdownRessource">
                <?php
                    foreach($ressources as $ressource){
                        echo "<li class=\"flex items-center\">
                        <input id=\"". $ressource['nom'] . "\" type=\"checkbox\" value=\"" . $ressource['nom'] ."\"
                        class=\"w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500\" />
    
                        <label for=\"semestre1\" class=\"ml-2 text-sm font-medium text-gray-900 dark:text-gray-100\">
                        ". $ressource['nom']."</label></li>";
                    }
                ?>
                </ul>
            </div>

            
                <div class="flex flex-col bg-white items-center rounded-3xl overflow-x-auto">
                <div class="sm:-mx-6 lg:-mx-8" style="width:95%;">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                    <table class="min-w-full text-center text-sm font-light">
                        <thead class="border-b bg-violet-900 font-medium bold text-white dark:border-neutral-500 dark:bg-neutral-900">
                        <tr>
                            <th scope="col" class=" px-6 py-4">Nom</th>
                            <th scope="col" class=" px-6 py-4">Ressource</th>
                            <th scope="col" class=" px-6 py-4">Semestre</th>
                            <th scope="col" class=" px-6 py-4">Enseignant</th>
                            <th scope="col" class=" px-6 py-4">Etat</th>
                            <th scope="col" class=" px-6 py-4">Salle</th>
                            <th scope="col" class=" px-6 py-4">Type</th>
                            <th scope="col" class=" px-6 py-4">Date du DS</th>
                            <th scope="col" class=" px-6 py-4">Date de rattrapage</th>
                            <th scope="col" class=" px-6 py-4">Durée</th>
                            <th scope="col" class=" px-6 py-4">Commentaire</th>
                            <th scope="col" class=" px-6 py-4">Absences</th>
                            <th scope="col" class=" px-6 py-4">Actions</th>
                        </tr>
                        </thead>
                        <tbody id="tableauRattrapage">
                        <?php foreach ($rattrapages as $rattrapage) : ?>
                            <tr class="border-b dark:border-neutral-500">
                            <td class="whitespace-nowrap  px-6 py-4"><?= $rattrapage['nom']; ?></td>
                            <td class="whitespace-nowrap  px-6 py-4"><?= $rattrapage['ressource']; ?></td>
                            <td id="tdSemestre" class="whitespace-nowrap  px-6 py-4"><?= $rattrapage['semestre']; ?></td>
                            <td class="whitespace-nowrap  px-6 py-4">
                                <?php 
                                    $string = trim($rattrapage['enseignant'], '{}');
                                    $array=explode(',',$string);
                                    foreach($array as $tmp)
                                        foreach($enseignants as $ens){
                                            if ($ens['id_utilisateur']==$tmp)
                                                echo $ens['nom'];
                                        }
                                                     
                                ?>
                            </td>
                            <td class="whitespace-nowrap  px-6 py-4  <?php if($rattrapage['etat'] == "En cours") : ?> text-amber-500 <?php elseif ($rattrapage['etat'] == "Neutralisé") : ?>  text-red-500 <?php elseif($rattrapage['etat'] == "Programmé") : ?> text-green-500 <?php endif; ?> ">
                                <?= $rattrapage['etat']; ?></td>
                            <td class="whitespace-nowrap  px-6 py-4">
                                <?php 
                                    if (empty($rattrapage['salle']) || $rattrapage['salle'] == null || $rattrapage['salle']== '')
                                        echo '-';
                                    else
                                        echo $rattrapage['salle'];
                                ?>
                            </td>




                            <td class="whitespace-nowrap  px-6 py-4"><?= $rattrapage['type']; ?></td>
                            <td class="whitespace-nowrap  px-6 py-4"><?= $rattrapage['dateDS']; ?></td>
                            <td class="whitespace-nowrap  px-6 py-4">
                                <?php 
                                if (empty($rattrapage['dateRattrapage']) || $rattrapage['dateRattrapage'] == null || $rattrapage['dateRattrapage']== '')
                                    echo '-';
                                else
                                    echo $rattrapage['dateRattrapage'];
                                ?></td>
                            <td class="whitespace-nowrap  px-6 py-4"><?= $rattrapage['duree']; ?></td>
                            <td class="whitespace-nowrap  px-6 py-4">
                                <?php 
                                    if (empty($rattrapage['commentaire']) || $rattrapage['commentaire'] == null || $rattrapage['commentaire']== '')
                                        echo '-';
                                    else
                                        echo $rattrapage['commentaire'];
                                ?></td>
                            <td class="whitespace-nowrap  px-6 py-4">
                                <button type="button" class="inline-block rounded bg-violet-600 px-2 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-violet-700"
                                        data-te-toggle="modal"
                                        <?php echo "data-te-target=\"#etudiantsAbsentsJustifies".$rattrapage['id_rattrapage']."\"" ?>
                                        data-te-ripple-init
                                        data-te-ripple-color="light">
                                    <svg class="w-[15px] h-[15px] fill-[#ffffff]" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"></path>
                                    </svg>
                                </button>
                            
                            
                            <!-- Modal -->
                            <div
                                    data-te-modal-init
                                    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                    <?php echo "id=\"etudiantsAbsentsJustifies".$rattrapage['id_rattrapage']."\"" ?>
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



                            <button type="button" class="inline-block rounded bg-violet-600 px-2 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-violet-700"
                                    data-te-toggle="modal"
                                    <?php echo "data-te-target=\"#etudiantsAbsentsNonJustifies".$rattrapage['id_rattrapage']."\"" ?>

                                    data-te-ripple-init
                                    data-te-ripple-color="light">
                                <svg class="w-[15px] h-[15px] fill-[#ffffff]" viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"></path>
                                </svg>
                            </button>
                            
                            
                            <!-- Modal -->
                            <div
                                    data-te-modal-init
                                    class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                                    <?php echo "id=\"etudiantsAbsentsNonJustifies".$rattrapage['id_rattrapage']."\"" ?>

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
                        </td>
                        
                        
                        <?php 
                        
                        $string = trim($rattrapage['enseignant'], '{}');
                                $array=explode(',',$string);
                                foreach($array as $tmp)
                                     foreach($enseignants as $ens){
                                        if ($ens['id_utilisateur']==$tmp)
                                            $enseignant = $ens['nom'];
                                        }
                        
                        if ($isdir == TRUE || $enseignant == session()->get('nom')) : ?>
                        <td class="whitespace-nowrap  px-6 py-4">
                            <button type="button" class="inline-block rounded bg-violet-600 px-2 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-violet-700">
                                <a href="/rattrapages/modifier/<?php echo $rattrapage['id_rattrapage']?>">
                                    <svg class="w-[15px] h-[15px] fill-[#ffffff]" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"></path>
                                    </svg>
                                </a>
                            </button>
                            <button type="button" class="inline-block rounded bg-violet-600 px-2 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out hover:bg-violet-700">
                                <a href="/rattrapages/supprimer/<?php echo $rattrapage['id_rattrapage']?>">
                                    <svg class="w-[15px] h-[15px] fill-[#ffffff]" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path>
                                    </svg>
                                </a> 
                            </button>
                        </td>
                        <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
            
            </div>
            <?php else : ?>
                <p>Aucun rattrapage trouvé.</p>
            <?php endif; ?>
            </div>
            </div>
        </div>

    </div>
    </div>
</div>
</section>

