<style>
#dropFileForm {
  margin: 16px;
  text-align: center;
  border-radius: 8px;
  overflow: hidden;
  transition: 0.5s;
}

#dropFileForm #fileLabel {
  background-color: rgba(0, 255, 0, 0.5);
  display: block;
  padding: 16px;
  position: relative;
  cursor: pointer;
}

#dropFileForm #fileInput {
  display: none;
}

#dropFileForm #fileLabel:after,
#dropFileForm #fileLabel:before {
  position: absolute;
  content: "";
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: #fff;
  z-index: -2;
  border-radius: 8px 8px 0 0;
}

#dropFileForm #fileLabel:before {
  z-index: -1;
  background: repeating-linear-gradient(
    45deg,
    transparent,
    transparent 5%,
    black 5%,
    black 10%
  );
  opacity: 0;
  transition: 0.5s;
}

#dropFileForm.fileHover #fileLabel:before {
  opacity: 0.25;
}

#dropFileForm .uploadButton {
  border: 0;
  outline: 0;
  width: 100%;
  padding: 8px;
  background-color: limeGreen;
  color: #fff;
  cursor: pointer;
}

#dropFileForm.fileHover {
  box-shadow: 0 0 16px limeGreen;
}

	
	
		
		
		
		
		
</style>

<form id="dropFileForm" action="uploadImage.php" method="post" onsubmit="uploadFiles(event)">
	<input type="file" name="files[]" id="fileInput" multiple onchange="addFiles(event)">
	
	<label for="fileInput" id="fileLabel" ondragover="overrideDefault(event);fileHover();" ondragenter="overrideDefault(event);fileHover();" ondragleave="overrideDefault(event);fileHoverEnd();" ondrop="overrideDefault(event);fileHoverEnd();
        addFiles(event);">
    
    <br>
    <span id="fileLabelText">
      Choose a file or drag it here
    </span>
    <br>
    <span id="uploadStatus"></span>
  </label>
	
	<input type="submit" value="Upload" class="uploadButton">
	
</form>

<script>
	var dropFileForm = document.getElementById("dropFileForm");
	var fileLabelText = document.getElementById("fileLabelText");
	var uploadStatus = document.getElementById("uploadStatus");
	var fileInput = document.getElementById("fileInput");
	var droppedFiles;

	function overrideDefault(event) {
	  event.preventDefault();
	  event.stopPropagation();
	}

	function fileHover() {
	  dropFileForm.classList.add("fileHover");
	}

	function fileHoverEnd() {
	  dropFileForm.classList.remove("fileHover");
	}

	function addFiles(event) {
	  droppedFiles = event.target.files || event.dataTransfer.files;
	  showFiles(droppedFiles);
	}

	function showFiles(files) {
	  if (files.length > 1) {
		fileLabelText.innerText = files.length + " files selected";
	  } else {
		fileLabelText.innerText = files[0].name;
	  }
	}

	function uploadFiles(event) {
	  event.preventDefault();
	  changeStatus("Uploading...");

	  var formData = new FormData();

	  for (var i = 0, file; (file = droppedFiles[i]); i++) {
		formData.append(fileInput.name, file, file.name);
		
	  }

	  var xhr = new XMLHttpRequest();
	  xhr.onreadystatechange = function(data) {
		//handle server response and change status of
		//upload process via changeStatus(text)
		console.log(xhr.response);		
	  };
	  xhr.open(dropFileForm.method, dropFileForm.action, true);
	  xhr.send(formData);	  
	

	//test depuis esbhb
	/*
	var formData = new FormData();

	  for (var i = 0, file; (file = droppedFiles[i]); i++) {
		formData.append(fileInput.name, file, file.name);
		
	  }  
	  
	 
	     
	$.ajax({
		url: 'exos/exosDragAndDrop/uploadImage.php',		
		dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        type: 'post'
	})
	.done(function (msg)
	{		
		alert(msg.retour);	
			
	});
	//fin test depuis esbhb
	*/
	
	/*var files=
	var xhr = new XMLHttpRequest();
	xhr.open('post','uploadImage.php',true); // true pour asynchonus
	xhr.setRequestHeader('Content-Type',"multipart/form-data");
	xhr.setRequestHeader('X-File-Name',file.fileName);
	xhr.setRequestHeader('X-File-Size',file.fileSize);
	xhr.setRequestHeader('X-File-Type',file.filetype);
	 xhr.send(file);	 
	*/
	}

	function changeStatus(text) {
	  uploadStatus.innerText = text;
	}
</script>

