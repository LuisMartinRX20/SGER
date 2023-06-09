<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>AlumnosCalificaciones</title>
    <style>
        .search-form {
    margin-bottom: 15px;
    background-color: #fdfefe;
    border-radius: 12px;
   
  }
  
  .search-label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
  }
  
  .search-container {
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
  }
  
  .search-input {
    flex-grow: 1;
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px 0 0 4px;
  }
  
  .search-button {
    padding: 8px 16px;
    font-size: 16px;
    color: #fff;
    background-color: #007bff;
    border: 1px solid #007bff;
    border-radius: 0 4px 4px 0;
    cursor: pointer;

  }
  .search-button:hover {
    background-color: #0069d9;
    border-color: #0062cc;
  }
    </style>
</head>
  <body>
              <form action="Mostar_AluCal.php" method="POST" class="search-form">
                    <label for="id" class="search-label">Buscar alumno por matrícula:</label>
                        <div class="search-container">
                          <input type="text" id="id" name="noControl" class="search-input">
                          <button type="submit" class="search-button" >Buscar</button>
                          <br>
                        </div>
                        <br>
              </form>             
  </body>
</html>