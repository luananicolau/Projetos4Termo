import java.util.Scanner;

// Exceção personalizada para valores inválidos
class ValorInvalidoException extends Exception {
    public ValorInvalidoException(String mensagem) {
        super(mensagem);
    }
}

public class CalculadoraFatorial {

    // Função recursiva para calcular o fatorial
    public static long calcularFatorial(int numero) throws ValorInvalidoException {
        if (numero < 0) {
            throw new ValorInvalidoException("Número negativo não é permitido.");
        } else if (numero == 0 || numero == 1) {
            return 1;
        } else {
            return numero * calcularFatorial(numero - 1);
        }
    }

    // Método para obter um número inteiro positivo do usuário
    private static int obterNumero(Scanner scanner) {
        while (true) {
            try {
                System.out.print("Digite um número inteiro positivo: ");
                int numero = Integer.parseInt(scanner.nextLine());
                if (numero < 0) {
                    throw new ValorInvalidoException("Número negativo não é permitido.");
                }
                return numero;
            } catch (NumberFormatException e) {
                System.out.println("Entrada inválida. Por favor, insira um número inteiro.");
            } catch (ValorInvalidoException e) {
                System.out.println("Erro: " + e.getMessage());
            }
        }
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        int numero = obterNumero(scanner);

        try {
            long resultado = calcularFatorial(numero);
            System.out.println("O fatorial de " + numero + " é: " + resultado);
        } catch (ValorInvalidoException e) {
            System.out.println("Erro: " + e.getMessage());
        }

        scanner.close();
    }
}
