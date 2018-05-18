<?php
echo $this->Form->create($submission, ['class' => 'contact-form']);
echo '<h1>Enter Your Contact Information</h1>';
echo $this->Form->input('name', ['label' => 'Name',
    ]) .
    $this->Form->input('birthdate', ['label' => 'Date of Birth', 
        'type' => 'text', 'id' => 'datepicker']) . 
        
     $this->Form->input('rate', ['label' => 'Hourly Rate', 
     'default' => '8.00', 'min' => '8.00', 'max' => '250', 'step' => '.25'
     ]) .
     
     $this->Form->input('hours', ['label' => 'Available Hours per Week',
        'default' => '20.00', 'min' => '0', 'max' => '80', 'step' => '.25'
    ]) .
     $this->Form->input('phone', ['label' => 'Phone Number']). 
     $this->Form->input('email') . 
     $this->Form->submit("Submit");
    ?> 
    
<script>
    var picker = new Pikaday({ 
        field: document.getElementById('datepicker'),
        firstDay: 1,
        format: 'MM/DD/YYYY',
        minDate: new Date(1900, 0, 0),
        maxDate: new Date(2005, 11, 31),
        yearRange: [1900, 2006],
        defaultDate: new Date(2005, 00, 31),
        bound: true,
    });
</script>
    