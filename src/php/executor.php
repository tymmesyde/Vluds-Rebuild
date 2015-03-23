<?php
	session_start();

	require("class/bdd.php");
	require("class/Engine.php");

	$dataArray = array();

	if(isset($_POST['action']) AND !empty($_POST['action']))
	{
		$action = $_POST['action'];

		if($action == "loadModel")
		{
			if(isset($_POST['modelName']))
			{
				$modelName = $_POST['modelName'];

				$returnModel = array();
				$returnModel = Engine::loadModel($modelName);
				$dataArray['error'] = $returnModel['error'];

				if($returnModel['result'] == true)	
				{
					$dataArray['reply'] = $returnModel['reply'];
					$dataArray['result'] = $returnModel['result'];
				}
				else
				{
					$dataArray['result'] = false;
				}
			}
			else
			{
				$dataArray['result'] = false;
			}
		}
	}
	else
	{
		$dataArray['result'] = "error: POST NOT SET";
	}

	echo json_encode($dataArray);
?>