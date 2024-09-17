import java.util.Scanner;

public class SistemaAprovacao {

    // Função para capturar as notas das disciplinas
    public static double[] capturarNotas(int numDisciplinas) {
        Scanner scanner = new Scanner(System.in);
        double[] notas = new double[numDisciplinas];

        for (int i = 0; i < numDisciplinas; i++) {
            while (true) {
                System.out.print("Digite a nota da disciplina " + (i + 1) + ": ");
                try {
                    double nota = Double.parseDouble(scanner.nextLine());
                    if (nota >= 0 && nota <= 10) {
                        notas[i] = nota;
                        break;
                    } else {
                        System.out.println("Nota inválida. Deve estar entre 0 e 10.");
                    }
                } catch (NumberFormatException e) {
                    System.out.println("Entrada inválida. Por favor, insira um número.");
                }
            }
        }
        return notas;
    }

    // Função para calcular a média com possível bônus
    public static double calcularMediaComBonus(double[] notas) {
        double soma = 0;
        for (double nota : notas) {
            soma += nota;
        }
        double media = soma / notas.length;

        // Verificar se o aluno obteve nota maior que 9 em todas as disciplinas
        boolean bonus = true;
        for (double nota : notas) {
            if (nota <= 9) {
                bonus = false;
                break;
            }
        }

        if (bonus) {
            media *= 1.10; // Aplica o bônus de 10%
        }

        return media;
    }

    // Função para determinar o status do aluno com base na média
    public static String determinarStatus(double media) {
        if (media >= 7) {
            return "Aprovado";
        } else if (media >= 5) {
            return "Recuperação";
        } else {
            return "Reprovado";
        }
    }

    public static void main(String[] args) {
        final int NUM_DISCIPLINAS = 4;
        System.out.println("Você deve informar as notas para " + NUM_DISCIPLINAS + " disciplinas.");

        // Captura as notas
        double[] notas = capturarNotas(NUM_DISCIPLINAS);

        // Calcula a média com possível bônus
        double media = calcularMediaComBonus(notas);

        // Determina o status do aluno
        String status = determinarStatus(media);

        // Exibe os resultados
        System.out.println("\nNotas:");
        for (int i = 0; i < notas.length; i++) {
            System.out.printf("Disciplina %d: %.2f\n", i + 1, notas[i]);
        }
        System.out.printf("Média Final: %.2f\n", media);
        System.out.println("Status: " + status);
    }
}
