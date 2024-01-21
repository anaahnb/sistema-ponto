function criarTabelaHorarios() {
    const turnos = ['Entrada da manhã', 'Saída da manhã', 'Entrada da tarde', 'Saída da tarde'];
    const diasDaSemana = ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'];

    const tableHead = document.querySelector('thead tr');
    const tableBody = document.querySelector('tbody');

    // Adiciona as células dos dias da semana no cabeçalho
    diasDaSemana.forEach((dia) => {
        const th = document.createElement('th');
        th.className = 'px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-gray-400';
        th.textContent = dia;
        tableHead.appendChild(th);
    });

    // Loop para criar as linhas da tabela
    turnos.forEach((turno) => {
        const row = document.createElement('tr');
    
        // Adiciona a célula do turno
        const turnoCell = document.createElement('td');
        turnoCell.className = 'px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200';
        turnoCell.textContent = turno;
        row.appendChild(turnoCell);
    
        // Adiciona as células dos dias da semana com inputs
        diasDaSemana.forEach((dia) => {
            const cell = document.createElement('td');
            cell.className = 'px-6 py-4 whitespace-nowrap';
    
            const input = document.createElement('input');
            input.name = `diasDaSemana[${dia}][${turno}]`;
            input.type = 'time';
            input.className = 'class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"';
            cell.appendChild(input);
    
            row.appendChild(cell);
        });
    
        tableBody.appendChild(row);
    });
}

// Chama a função para criar a tabela quando a página carregar
document.addEventListener('DOMContentLoaded', criarTabelaHorarios);