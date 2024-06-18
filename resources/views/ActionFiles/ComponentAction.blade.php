<div>
    <div class="shadow bg-body-tertiary rounded text-center mx-auto w-75 p-4">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="Membres-tab" data-bs-toggle="tab" href="#Membres" role="tab" aria-controls="Membres" aria-selected="true">Membres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Action-tab" data-bs-toggle="tab" href="#Action" role="tab" aria-controls="Action" aria-selected="false">Ajouter Action</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="projet-tab" data-bs-toggle="tab" href="#projet" role="tab" aria-controls="projet" aria-selected="false">Modifier Projet</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" id="chat-tab" data-bs-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="false">Commentaires</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Membres" role="tabpanel" aria-labelledby="Membres-tab" style="width: 95%;margin: 2% auto;max-height: 500px;overflow-y: auto;min-height: 500px;">
            @include("ActionFiles.Membres")
            </div>
            <div class="tab-pane fade" id="Action" role="tabpanel" aria-labelledby="Action-tab">
            @include('ActionFiles.Creation')
	</div>
            <div class="tab-pane fade" id="projet" role="tabpanel" aria-labelledby="projet-tab">
            @include('ProjetFiles.Modification')
        </div>
		<div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="Membres-tab" style="width: 95%;margin: 2% auto;max-height: 500px;overflow-y: auto;min-height: 500px;">
        @include('ActionFiles.Comments')
        </div>
        </div>
    </div>
</div>
