<div>
    <input type="text" class="datepicker">
</div>
<div class="container">
    <div class="chart-container">
        <?php $i = 0; foreach ($teacher as $fil_teacher):?>
                    <label>Teacher: <?php echo $fil_teacher->name ?> <?php echo $fil_teacher->lastname ?></label>
                    <canvas id="chartpermanence<?php echo $i?>">
                        <script>
                            var ctx = document.getElementById('chartpermanence<?php echo $i?>').getContext('2d');
                            var chart = new Chart(ctx, {
                        // The type of chart we want to create
                                type: 'bar',

                        // The data for our dataset
                                data: {
                                    labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo"],
                                    datasets: [{
                                            label: "Ingreso Diario",
                                            backgroundColor: 'rgb(255, 55, 52)',
                                            borderColor: 'rgb(0, 0, 0)',
                                            data: [2, 1, 3, 6, 12, 0, 0],
                                        }],

                                    },

                        // Configuration options go here
                                options: {}
                            });
                        </script>
                    </canvas>
        <?php $i++; endforeach; ?>
        
    </div>
    <br>
</div>


      <script type="text/javascript">
          
            $('.datepicker').pickadate({
                selectMonths: true, // Creates a dropdown to control month
                selectYears: 15, // Creates a dropdown of 15 years to control year,
                today: 'Today',
                clear: 'Clear',
                close: 'Ok',
                closeOnSelect: false // Close upon selecting a date,
                container: undefined, // ex. 'body' will append picker to body
              });
      </script>

    
