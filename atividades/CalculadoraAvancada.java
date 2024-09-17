import java.util.Scanner;

// Classe base para operações matemáticas
abstract class Operacao {
    abstract double executar(double a, double b) throws ArithmeticException;
}

// Subclasse para soma
class Soma extends Operacao {
    @Override
    double executar(double a, double b) {
        return a + b;
    }
}

// Subclasse para subtração
class Subtracao extends Operacao {
    @Override
    double executar(double a, double b) {
        return a - b;
    }
}

// Subclasse para multiplicação
class Multiplicacao extends Operacao {
    @Override
    double executar(double a, double b) {
        return a * b;
    }
}

// Subclasse para divisão
class Divisao extends Operacao {
    @Override
    double executar(double a, double b) throws ArithmeticException {
        if (b == 0) {
            throw new ArithmeticException("Divisão por zero não permitida.");
        }
        return a / b;
    }
}

// Subclasse para raiz quadrada
class RaizQuadrada extends Operacao {
    @Override
    double executar(double a, double b) throws ArithmeticException {
        if (a < 0) {
            throw new ArithmeticException("Não é possível calcular a raiz quadrada de um número negativo.");
        }
        return Math.sqrt(a);
    }
}

public class CalculadoraAvancada {

    private static void mostrarMenu() {
        System.out.println("\nCalculadora Avançada");
        System.out.println("1. Soma");
        System.out.println("2. Subtração");
        System.out.println("3. Multiplicação");
        System.out.println("4. Divisão");
        System.out.println("5. Raiz Quadrada");
        System.out.println("6. Sair");
        System.out.print("Escolha uma opção: ");
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int opcao;

        do {
            mostrarMenu();
            opcao = obterNumeroInteiro(scanner);

            try {
                switch (opcao) {
                    case 1:
                        System.out.print("Digite o primeiro número: ");
                        double a1 = obterNumero(scanner);
                        System.out.print("Digite o segundo número: ");
                        double b1 = obterNumero(scanner);
                        Operacao soma = new Soma();
                        System.out.println("Resultado: " + soma.executar(a1, b1));
                        break;
                    case 2:
                        System.out.print("Digite o primeiro número: ");
                        double a2 = obterNumero(scanner);
                        System.out.print("Digite o segundo número: ");
                        double b2 = obterNumero(scanner);
                        Operacao subtracao = new Subtracao();
                        System.out.println("Resultado: " + subtracao.executar(a2, b2));
                        break;
                    case 3:
                        System.out.print("Digite o primeiro número: ");
                        double a3 = obterNumero(scanner);
                        System.out.print("Digite o segundo número: ");
                        double b3 = obterNumero(scanner);
                        Operacao multiplicacao = new Multiplicacao();
                        System.out.println("Resultado: " + multiplicacao.executar(a3, b3));
                        break;
                    case 4:
                        System.out.print("Digite o numerador: ");
                        double a4 = obterNumero(scanner);
                        System.out.print("Digite o denominador: ");
                        double b4 = obterNumero(scanner);
                        Operacao divisao = new Divisao();
                        System.out.println("Resultado: " + divisao.executar(a4, b4));
                        break;
                    case 5:
                        System.out.print("Digite o número: ");
                        double a5 = obterNumero(scanner);
                        Operacao raizQuadrada = new RaizQuadrada();
                        System.out.println("Resultado: " + raizQuadrada.executar(a5, 0)); // o segundo parâmetro é
                                                                                          // ignorado
                        break;
                    case 6:
                        System.out.println("Saindo...");
                        break;
                    default:
                        System.out.println("Opção inválida. Tente novamente.");
                }
            } catch (ArithmeticException e) {
                System.out.println("Erro: " + e.getMessage());
            } catch (Exception e) {
                System.out.println("Erro inesperado: " + e.getMessage());
            }
        } while (opcao != 6);

        scanner.close();
    }

    private static int obterNumeroInteiro(Scanner scanner) {
        while (true) {
            try {
                return Integer.parseInt(scanner.nextLine());
            } catch (NumberFormatException e) {
                System.out.println("Entrada inválida. Por favor, insira um número inteiro.");
            }
        }
    }

    private static double obterNumero(Scanner scanner) {
        while (true) {
            try {
                return Double.parseDouble(scanner.nextLine());
            } catch (NumberFormatException e) {
                System.out.println("Entrada inválida. Por favor, insira um número.");
            }
        }
    }
}
