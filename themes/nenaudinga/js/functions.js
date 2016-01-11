

function init()
{
}

function randomizeImagesPositions(){
    
    
}

function agterLoad(){

}

function showHideFileUpload(source){
	var sourceType = $(source).val();
	var typeRow = $("tr[name=obrazekTr]");

	if(sourceType == 'tekst'){
		$(typeRow).hide();
		return;
	}
	
	if(sourceType == 'tekst_obrazek'){
		$(typeRow).show();
		return;
	}
}