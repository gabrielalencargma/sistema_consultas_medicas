CREATE TABLE Consulta (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    especialidade VARCHAR(30),
    duracao INT,
    valor DECIMAL(10,2),
    medico VARCHAR(30),
    data DATE,
    horario TIME,
    status VARCHAR(20)
);

INSERT INTO Consulta (especialidade, duracao, valor, medico, data, horario, status) VALUES
('Cardiologia', 30, 250.00, 'Dr. Silva', '2025-06-10', '09:00:00', 'Agendada'),
('Dermatologia', 45, 180.00, 'Dra. Almeida', '2025-06-11', '10:30:00', 'Realizada'),
('Pediatria', 40, 200.00, 'Dr. Souza', '2025-06-12', '11:15:00', 'Agendada'),
('Ortopedia', 60, 300.00, 'Dr. Pereira', '2025-06-13', '14:00:00', 'Cancelada'),
('Ginecologia', 50, 220.00, 'Dra. Costa', '2025-06-14', '15:30:00', 'Realizada'),
('Oftalmologia', 35, 190.00, 'Dr. Oliveira', '2025-06-15', '08:45:00', 'Agendada'),
('Psiquiatria', 60, 280.00, 'Dra. Martins', '2025-06-16', '13:00:00', 'Cancelada'),
('Neurologia', 55, 320.00, 'Dr. Carvalho', '2025-06-17', '16:00:00', 'Realizada'),
('Endocrinologia', 40, 210.00, 'Dra. Fernandes', '2025-06-18', '09:30:00', 'Agendada'),
('Gastroenterologia', 45, 230.00, 'Dr. Lima', '2025-06-19', '11:00:00', 'Realizada');