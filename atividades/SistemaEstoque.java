import java.io.*;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

// Classe Item com nome e quantidade
class Item {
    String nome;
    int quantidade;

    public Item(String nome, int quantidade) {
        this.nome = nome;
        this.quantidade = quantidade;
    }

    @Override
    public String toString() {
        return nome + ":" + quantidade;
    }
}

public class SistemaEstoque {

    private static final String ARQUIVO_ESTOQUE = "estoque.txt";
    private List<Item> estoque = new ArrayList<>();

    // Método para adicionar um item ao estoque
    public void adicionarItem(String nome, int quantidade) {
        estoque.add(new Item(nome, quantidade));
        System.out.println("Item adicionado com sucesso.");
    }

    // Método para remover um item do estoque
    public void removerItem(String nome) {
        for (int i = 0; i < estoque.size(); i++) {
            if (estoque.get(i).nome.equalsIgnoreCase(nome)) {
                estoque.remove(i);
                System.out.println("Item removido com sucesso.");
                return;
            }
        }
        System.out.println("Item não encontrado.");
    }

    // Método para listar todos os itens
    public void listarItens() {
        if (estoque.isEmpty()) {
            System.out.println("O estoque está vazio.");
            return;
        }
        for (Item item : estoque) {
            System.out.println(item);
        }
    }

    // Método para salvar o estoque em um arquivo
    public void salvarEstoque() {
        try (BufferedWriter writer = new BufferedWriter(new FileWriter(ARQUIVO_ESTOQUE))) {
            for (Item item : estoque) {
                writer.write(item.toString());
                writer.newLine();
            }
            System.out.println("Estoque salvo com sucesso.");
        } catch (IOException e) {
            System.out.println("Erro ao salvar o estoque: " + e.getMessage());
        }
    }

    // Método para carregar o estoque a partir de um arquivo
    public void carregarEstoque() {
        File file = new File(ARQUIVO_ESTOQUE);
        if (!file.exists()) {
            System.out.println("Arquivo não encontrado. Criando um novo arquivo.");
            return; // Retorna sem carregar nada se o arquivo não existir
        }
        try (BufferedReader reader = new BufferedReader(new FileReader(file))) {
            String linha;
            while ((linha = reader.readLine()) != null) {
                String[] partes = linha.split(":");
                if (partes.length == 2) {
                    String nome = partes[0];
                    int quantidade = Integer.parseInt(partes[1]);
                    estoque.add(new Item(nome, quantidade));
                }
            }
            System.out.println("Estoque carregado com sucesso.");
        } catch (IOException e) {
            System.out.println("Erro ao carregar o estoque: " + e.getMessage());
        } catch (NumberFormatException e) {
            System.out.println("Formato inválido no arquivo de estoque: " + e.getMessage());
        }
    }

    // Método principal para interagir com o usuário
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        SistemaEstoque sistema = new SistemaEstoque();

        // Carregar estoque ao iniciar o programa
        sistema.carregarEstoque();

        int opcao;
        do {
            System.out.println("\nSistema de Estoque");
            System.out.println("1. Adicionar Item");
            System.out.println("2. Remover Item");
            System.out.println("3. Listar Itens");
            System.out.println("4. Salvar Estoque");
            System.out.println("5. Sair");
            System.out.print("Escolha uma opção: ");
            opcao = obterNumeroInteiro(scanner);

            switch (opcao) {
                case 1:
                    System.out.print("Nome do item: ");
                    String nome = scanner.nextLine();
                    System.out.print("Quantidade do item: ");
                    int quantidade = obterNumeroInteiro(scanner);
                    sistema.adicionarItem(nome, quantidade);
                    break;
                case 2:
                    System.out.print("Nome do item a ser removido: ");
                    nome = scanner.nextLine();
                    sistema.removerItem(nome);
                    break;
                case 3:
                    sistema.listarItens();
                    break;
                case 4:
                    sistema.salvarEstoque();
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

    // Método para obter um número inteiro do usuário
    private static int obterNumeroInteiro(Scanner scanner) {
        while (true) {
            try {
                return Integer.parseInt(scanner.nextLine());
            } catch (NumberFormatException e) {
                System.out.println("Entrada inválida. Por favor, insira um número inteiro.");
            }
        }
    }
}
