import java.util.ArrayList;
import java.util.Scanner;

class Funcionario {
    String nome;
    int idade;
    double salario;

    public Funcionario(String nome, int idade, double salario) {
        this.nome = nome;
        this.idade = idade;
        this.salario = salario;
    }

    @Override
    public String toString() {
        return "Nome: " + nome + ", Idade: " + idade + ", Salário: " + salario;
    }
}

public class GerenciamentoFuncionarios {

    private static ArrayList<Funcionario> funcionarios = new ArrayList<>();

    public static void adicionarFuncionario(String nome, int idade, double salario) {
        funcionarios.add(new Funcionario(nome, idade, salario));
    }

    public static void removerFuncionario(String nome) {
        boolean encontrado = false;
        for (Funcionario f : funcionarios) {
            if (f.nome.equalsIgnoreCase(nome)) {
                funcionarios.remove(f);
                encontrado = true;
                System.out.println("Funcionário removido com sucesso.");
                break;
            }
        }
        if (!encontrado) {
            System.out.println("Funcionário não encontrado.");
        }
    }

    public static void listarFuncionarios() {
        if (funcionarios.isEmpty()) {
            System.out.println("Nenhum funcionário cadastrado.");
        } else {
            for (Funcionario f : funcionarios) {
                System.out.println(f);
            }
        }
    }

    public static void calcularMediaSalarial() {
        if (funcionarios.isEmpty()) {
            System.out.println("Nenhum funcionário cadastrado.");
            return;
        }
        double somaSalarios = 0;
        for (Funcionario f : funcionarios) {
            somaSalarios += f.salario;
        }
        double mediaSalarial = somaSalarios / funcionarios.size();
        System.out.println("Média salarial: " + mediaSalarial);
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int opcao;

        do {
            System.out.println("\nGerenciamento de Funcionários");
            System.out.println("1. Adicionar Funcionário");
            System.out.println("2. Remover Funcionário");
            System.out.println("3. Listar Funcionários");
            System.out.println("4. Calcular Média Salarial");
            System.out.println("5. Sair");
            System.out.print("Escolha uma opção: ");
            opcao = scanner.nextInt();
            scanner.nextLine(); // Consumir o newline

            switch (opcao) {
                case 1:
                    System.out.print("Nome do funcionário: ");
                    String nome = scanner.nextLine();
                    System.out.print("Idade do funcionário: ");
                    int idade = scanner.nextInt();
                    System.out.print("Salário do funcionário: ");
                    double salario = scanner.nextDouble();
                    scanner.nextLine(); // Consumir o newline
                    adicionarFuncionario(nome, idade, salario);
                    break;
                case 2:
                    System.out.print("Nome do funcionário a ser removido: ");
                    nome = scanner.nextLine();
                    removerFuncionario(nome);
                    break;
                case 3:
                    listarFuncionarios();
                    break;
                case 4:
                    calcularMediaSalarial();
                    break;
                case 5:
                    System.out.println("Saindo...");
                    break;
                default:
                    System.out.println("Opção inválida. Tente novamente.");
            }
        } while (opcao != 5);

        scanner.close();
    }
}
