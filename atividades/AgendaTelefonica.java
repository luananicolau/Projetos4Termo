import java.util.Scanner;

// Classe Contato com nome e telefone
class Contato {
    String nome;
    String telefone;

    public Contato(String nome, String telefone) {
        this.nome = nome;
        this.telefone = telefone;
    }

    @Override
    public String toString() {
        return "Nome: " + nome + ", Telefone: " + telefone;
    }
}

// Exceção personalizada para contato não encontrado
class ContatoNaoEncontradoException extends Exception {
    public ContatoNaoEncontradoException(String mensagem) {
        super(mensagem);
    }
}

// Exceção personalizada para agenda cheia
class AgendaCheiaException extends Exception {
    public AgendaCheiaException(String mensagem) {
        super(mensagem);
    }
}

// Classe AgendaTelefônica
public class AgendaTelefonica {

    private static final int MAX_CONTATOS = 100;
    private Contato[] contatos = new Contato[MAX_CONTATOS];
    private int quantidadeContatos = 0;

    // Método para adicionar um contato
    public void adicionarContato(String nome, String telefone) throws AgendaCheiaException {
        if (quantidadeContatos >= MAX_CONTATOS) {
            throw new AgendaCheiaException("A agenda está cheia. Não é possível adicionar mais contatos.");
        }
        contatos[quantidadeContatos++] = new Contato(nome, telefone);
        System.out.println("Contato adicionado com sucesso.");
    }

    // Método para remover um contato
    public void removerContato(String nome) throws ContatoNaoEncontradoException {
        for (int i = 0; i < quantidadeContatos; i++) {
            if (contatos[i].nome.equalsIgnoreCase(nome)) {
                // Move todos os contatos para preencher o espaço do contato removido
                for (int j = i; j < quantidadeContatos - 1; j++) {
                    contatos[j] = contatos[j + 1];
                }
                contatos[--quantidadeContatos] = null; // Remove a referência ao último contato
                System.out.println("Contato removido com sucesso.");
                return;
            }
        }
        throw new ContatoNaoEncontradoException("Contato com o nome " + nome + " não encontrado.");
    }

    // Método para buscar um contato
    public Contato buscarContato(String nome) throws ContatoNaoEncontradoException {
        for (int i = 0; i < quantidadeContatos; i++) {
            if (contatos[i].nome.equalsIgnoreCase(nome)) {
                return contatos[i];
            }
        }
        throw new ContatoNaoEncontradoException("Contato com o nome " + nome + " não encontrado.");
    }

    // Método para listar todos os contatos
    public void listarContatos() {
        if (quantidadeContatos == 0) {
            System.out.println("A agenda está vazia.");
            return;
        }
        for (int i = 0; i < quantidadeContatos; i++) {
            System.out.println(contatos[i]);
        }
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        AgendaTelefonica agenda = new AgendaTelefonica();
        int opcao;

        do {
            System.out.println("\nAgenda Telefônica");
            System.out.println("1. Adicionar Contato");
            System.out.println("2. Remover Contato");
            System.out.println("3. Buscar Contato");
            System.out.println("4. Listar Contatos");
            System.out.println("5. Sair");
            System.out.print("Escolha uma opção: ");
            opcao = obterNumeroInteiro(scanner);

            try {
                switch (opcao) {
                    case 1:
                        System.out.print("Nome do contato: ");
                        String nome = scanner.nextLine();
                        System.out.print("Telefone do contato: ");
                        String telefone = scanner.nextLine();
                        agenda.adicionarContato(nome, telefone);
                        break;
                    case 2:
                        System.out.print("Nome do contato a ser removido: ");
                        nome = scanner.nextLine();
                        agenda.removerContato(nome);
                        break;
                    case 3:
                        System.out.print("Nome do contato a ser buscado: ");
                        nome = scanner.nextLine();
                        Contato contato = agenda.buscarContato(nome);
                        System.out.println("Contato encontrado: " + contato);
                        break;
                    case 4:
                        agenda.listarContatos();
                        break;
                    case 5:
                        System.out.println("Saindo...");
                        break;
                    default:
                        System.out.println("Opção inválida. Tente novamente.");
                }
            } catch (AgendaCheiaException e) {
                System.out.println("Erro: " + e.getMessage());
            } catch (ContatoNaoEncontradoException e) {
                System.out.println("Erro: " + e.getMessage());
            } catch (Exception e) {
                System.out.println("Erro inesperado: " + e.getMessage());
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
